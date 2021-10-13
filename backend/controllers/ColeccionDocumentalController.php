<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\ColeccionDocumental\ColeccionDocumentalArchivo;
use backend\models\Etiqueta\Etiqueta;
use backend\models\Etiqueta\EtiquetaColeccionDocumental;
use Yii;
use backend\models\ColeccionDocumental\ColeccionDocumental;
use backend\models\ColeccionDocumental\ColeccionDocumentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;


/**
 * ColeccionDocumentalController implements the CRUD actions for ColeccionDocumental model.
 */
class ColeccionDocumentalController extends Controller
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
     * Lists all ColeccionDocumental models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColeccionDocumentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_coleccion_documental' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ColeccionDocumental model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ColeccionDocumental model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ColeccionDocumental();
        $modelsArchivo = [new ColeccionDocumentalArchivo];

        $x = 0; $labelfinal= "";
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
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al día de hoy');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            };
            if (is_array($model->etiquetasarray)) {
                $labelfinal=''; $x=0;
                foreach ($model->etiquetasarray as $label) {
                    $etiqueta = Etiqueta::find()->where(['id' => $label])->one();
                    $etiquetaTemp = new EtiquetaColeccionDocumental();
                    $etiquetaTemp->id_coleccion_documental = $model->id_coleccion_documental;
                    $etiquetaTemp->id_etiqueta = $etiqueta->id;
                    $etiquetaTemp->save();
                    if ($x==0){
                        $labelfinal= $etiqueta->etiqueta." ;";
                    }
                    else $labelfinal = $labelfinal." ".$etiqueta->etiqueta." ;";
                    $x++;
                }
                $model->etiquetas= $labelfinal;
            }


            $modelsArchivo = Model::createMultiple(ColeccionDocumentalArchivo::classname());
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
                                    Yii::$app->session->setFlash('error', 'Un Documento solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new ColeccionDocumentalArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_coleccion_documental = $model->id_coleccion_documental;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Coordinación Académica / Colección Documental / Colección Documental - Documentos / Crear Documento - Archivo Asociado', $model->id_coleccion_documental, $model->titulo, 'Insertar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model,  'Coordinación Académica / Colección Documental / Colección Documental - Documentos / Crear Documento', $model->id_coleccion_documental, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new ColeccionDocumentalArchivo] : $modelsArchivo,
        ]);

    }

    /**
     * Updates an existing ColeccionDocumental model.
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
        $array = []; $i=0;
        $etiquetas= EtiquetaColeccionDocumental::find()->where(['id_coleccion_documental' => $id])->all();
        foreach ($etiquetas as $new){
            $array[$i] = Etiqueta::find()->where(['id'=> $new->id_etiqueta])->one();
            $i++;
        }
        $model->etiquetasarray = $array;
        $modelsArchivo = ColeccionDocumentalArchivo::find()->where(['id_coleccion_documental' => $model->id_coleccion_documental])->all();
        if($model->fecha != null){
            $model->year = date('Y', strtotime($model->fecha));
            $model->month = date('m', strtotime($model->fecha));
            $model->day = date('d', strtotime($model->fecha));
        }
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
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al día de hoy');
                    return $this->redirect([
                        'update', 'id'=>$id,
                        'model' => $model,
                    ]);
                }
            };

            foreach ($etiquetas as $arr){
                $arr->delete();
            }
            if (is_array($model->etiquetasarray)) {
                $labelfinal=''; $x=0;
                foreach ($model->etiquetasarray as $label) {
                    $etiqueta = Etiqueta::find()->where(['id' => $label])->one();
                    $etiquetaTemp = new EtiquetaColeccionDocumental();
                    $etiquetaTemp->id_coleccion_documental = $model->id_coleccion_documental;
                    $etiquetaTemp->id_etiqueta = $etiqueta->id;
                    $etiquetaTemp->save();
                    if ($x==0){
                        $labelfinal= $etiqueta->etiqueta." ;";
                    }
                    else $labelfinal = $labelfinal." ".$etiqueta->etiqueta." ;";
                    $x++;
                }
                $model->etiquetas= $labelfinal;
            }


            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(ColeccionDocumentalArchivo::classname(), $modelsArchivo);
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
                            ColeccionDocumentalArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = new Archivo();
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Un Documento solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'update', 'model' => $model,'id'=>$model->id_coleccion_documental,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new ColeccionDocumentalArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }


                            $modelArchivo->id_coleccion_documental = $model->id_coleccion_documental;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Coordinación Académica / Colección Documental / Colección Documental - Documentos / Modificar Documento - Archivo Asociado', $model->id_coleccion_documental, $model->titulo, 'Modificar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Coordinación Académica / Colección Documental / Colección Documental - Documentos / Modificar Documento', $this->findModel($id)->id_coleccion_documental, $this->findModel($id)->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new ColeccionDocumentalArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing ColeccionDocumental model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $temporal = ColeccionDocumentalArchivo::find()->where(['id_coleccion_documental' => $this->findModel($id)->id_coleccion_documental])->all();
        foreach ($temporal as $t){
            $t->delete();
        }
        AuditEntryController::afterDelete(  $this->findModel($id), 'Coordinación Académica / Colección Documental / Colección Documental - Documentos / Eliminar Documento', $this->findModel($id)->id_coleccion_documental, $this->findModel($id)->titulo);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the ColeccionDocumental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ColeccionDocumental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ColeccionDocumental::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
