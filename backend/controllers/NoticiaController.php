<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\Comentario\Comentario;
use backend\models\Noticia\NoticiaArchivo;
use backend\models\Noticia\NoticiaComentario;
use Yii;
use backend\models\Noticia\Noticia;
use backend\models\Noticia\NoticiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use Exception;
use yii\db\Expression;

/**
 * NoticiaController implements the CRUD actions for Noticia model.
 */
class NoticiaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Noticia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NoticiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_noticia' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionExcel()
    {
        $model = new Noticia();
        $inputFile = 'uploads/new.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
        $objReader =  \PhpExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFile);

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, True, False);
            if ($row == 1) {
                continue;
            }
            $model = new Noticia();
            $model->revisado = $rowData[0][1];
            $model->publico = $rowData[0][2];
            $model->titulo_noticia = $rowData[0][3];
            $model->fecha = date('Y-m-d');
            $model->referencia = $rowData[0][5];
            $model->descripcion = $rowData[0][6];
            $model->save();
        }


        return $this->render('excel', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Noticia model.
     * @param string $id
     * @return mixed public function actionView($id)
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
        ]);
    }


    /**
     * Creates a new Noticia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Noticia;
        $modelsArchivo = [new NoticiaArchivo];
        $x = 0;
        if ($model->load(Yii::$app->request->post())) {
            if (($model->year != null && ($model->month == null || $model->day ==null))  ||  (($model->year == null || $model->day ==null) && $model->month != null ) ||(($model->year == null || $model->month == null) && $model->day !=null)) {
                Yii::$app->session->setFlash('error', 'La fecha debe estar completa o no ser insertada');
                return $this->redirect([
                    'create',
                    'model' => $model,
                ]);
            }
            if ($model->year == null && $model->month == null && $model->day ==null){
                $model->fecha= null;
            }
            else {
                $model->fecha = $model->year.'-'.$model->month.'-'.$model->day;
                if($model->fecha > date('Y-m-d')){
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al d??a de hoy');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            };
            if ($model->publico == 1) {
                $model->fecha = new Expression('NOW()');
            }
            $modelsArchivo = Model::createMultiple(NoticiaArchivo::classname());
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsArchivo),
                    ActiveForm::validate($model)
                );
            }
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsArchivo as $modelArchivo) {
                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = new Archivo();
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Una Noticia solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new NoticiaArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_noticia = $model->id_noticia;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                            else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Inicio / Noticias / Crear Noticia - Archivo Asociado', $model->id_noticia, $model->titulo_noticia, 'Insertar');

                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Inicio / Noticias / Crear Noticia', $model->id_noticia, $model->titulo_noticia);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new NoticiaArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Updates an existing Noticia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $x = 0;
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);
        $modelsArchivo = NoticiaArchivo::find()->where(['id_noticia' => $model->id_noticia])->all();
        if($model->fecha != null){
            $model->year = date('Y', strtotime($model->fecha));
            $model->month = date('m', strtotime($model->fecha));
            $model->day = date('d', strtotime($model->fecha));
        }
        $anterior = $model->publico;
        if ($model->load(Yii::$app->request->post())) {
            if (($model->year != null && ($model->month == null || $model->day ==null))  ||  (($model->year == null || $model->day ==null) && $model->month != null ) ||(($model->year == null || $model->month == null) && $model->day !=null)) {
                Yii::$app->session->setFlash('error', 'La fecha debe estar completa o no ser insertada');
                return $this->redirect([
                    'update', 'id'=>$id,
                    'model' => $model,
                ]);
            }

            if ($model->year == null && $model->month == null && $model->day ==null){
                $model->fecha= null;
            }
            else {
                $model->fecha = $model->year.'-'.$model->month.'-'.$model->day;
                if($model->fecha > date('Y-m-d')){
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al d??a de hoy');
                    return $this->redirect([
                        'update', 'id'=>$id,
                        'model' => $model,
                    ]);
                }
            };
            if (($model->publico == 1) && ($anterior == 0)) {
                $model->fecha = new Expression('NOW()');
            }
            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(NoticiaArchivo::classname(), $modelsArchivo);
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsArchivo, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            NoticiaArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Una Noticia solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'update', 'model' => $model, 'id' => $model->id_noticia,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new NoticiaArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }


                            $modelArchivo->id_noticia = $model->id_noticia;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', $model->id_noticia, $model->titulo_noticia, 'Modificar');

                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Inicio / Noticias / Modificar Noticia', $model->id_noticia, $model->titulo_noticia);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new NoticiaArchivo] : $modelsArchivo,
        ]);
    }
    /**
     * Deletes an existing Noticia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $comentarios = Comentario::find()->where(['tabla' => 'noticia', 'id_tabla' => $id])->all();
        $eliminar = Comentario::find()->where(['tabla' => 'noticia', 'id_tabla' => $id])->all();
        foreach ($comentarios as $comentario) {
            for ($x = 0; $x <= 7; $x++) {
                $primeros = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $comentario->id])->all();
                $eliminar = array_merge($eliminar, $primeros);
                foreach ($primeros as $primero) {
                    $segundos = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $primero->id])->all();
                    $eliminar = array_merge($eliminar, $segundos);
                    foreach ($segundos as $segundo) {
                        $terceros = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $segundo->id])->all();
                        $eliminar = array_merge($eliminar, $terceros);
                    }
                }
            }
        }
        foreach ($eliminar as $e) {
            $e->delete();
        }



        $temporal = NoticiaArchivo::find()->where(['id_noticia' => $this->findModel($id)->id_noticia])->all();
        foreach ($temporal as $t) {
            $t->delete();
        }
        AuditEntryController::afterDelete(  $this->findModel($id), 'Inicio / Noticias / Eliminar Noticia', $this->findModel($id)->id_noticia, $this->findModel($id)->titulo_noticia);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Noticia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Noticia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Noticia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
