<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\Hecho\HechoArchivo;
use Yii;
use backend\models\Hecho\Hecho;
use backend\models\Hecho\HechoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/**
 * HechoController implements the CRUD actions for Hecho model.
 */
class HechoController extends Controller
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
     * Lists all Hecho models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HechoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_hecho' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hecho model.
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
     * Creates a new Hecho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Hecho();
        $modelsArchivo = [new HechoArchivo];
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
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al día de hoy');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            };
            $modelsArchivo = Model::createMultiple(HechoArchivo::classname());
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
                $fecha = $model->fecha;
                if($fecha != null){
                    if ($fecha < "1928-06-13") {$model->etapa = "Anterior a 1928";}
                    if (($fecha < "1943-6-15") && ($fecha > "1928-06-13")) {$model->etapa = "Infancia";}
                    if(($fecha > "1943-06-14")&&($fecha < "1953-06-15")){$model->etapa = "Adolescencia";}
                    if(($fecha >"1953-06-14")&&($fecha < "1958-06-15")){$model->etapa = "Adulto Joven";}
                    if(($fecha > "1958-06-14")&&($fecha < "1967-10-10")){$model->etapa = "Adulto";}
                    if($fecha > "1967-10-9"){$model->etapa = "Posterior a 1967";}
                }
                if ($fecha == null){
                    $model->etapa = "No definida";
                }
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
                                    Yii::$app->session->setFlash('error', 'Un Hecho solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new HechoArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_hecho = $model->id_hecho;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Vida y Obra / Cronología / Crear Hecho', $model->id_hecho, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new HechoArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Updates an existing Hecho model.
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
        $modelsArchivo = HechoArchivo::find()->where(['id_hecho' => $model->id_hecho])->all();
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
            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(HechoArchivo::classname(), $modelsArchivo);
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsArchivo, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;

            if ($valid) {
                $fecha = $model->fecha;
                if($fecha != null){
                    if ($fecha < "1928-06-13") {$model->etapa = "Anterior a 1928";}
                    if (($fecha < "1943-6-15") && ($fecha > "1928-06-13")) {$model->etapa = "Infancia";}
                    if(($fecha > "1943-06-14")&&($fecha < "1953-06-15")){$model->etapa = "Adolescencia";}
                    if(($fecha >"1953-06-14")&&($fecha < "1958-06-15")){$model->etapa = "Adulto Joven";}
                    if(($fecha > "1958-06-14")&&($fecha < "1967-10-10")){$model->etapa = "Adulto";}
                    if($fecha > "1967-10-9"){$model->etapa = "Posterior a 1967";}
                }
                if ($fecha == null){
                    $model->etapa = "No definida";
                }
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            HechoArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = new Archivo();
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Un hecho solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'update', 'model' => $model,'id'=>$model->id_hecho,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new HechoArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }


                            $modelArchivo->id_hecho = $model->id_hecho;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Vida y Obra / Cronología / Modificar Hecho', $model->id_hecho, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new HechoArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing Hecho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $temporal5 = HechoArchivo::find()->where(['id_hecho' => $this->findModel($id)->id_hecho])->all();
        foreach ($temporal5 as $t5){
            $t5->delete();
        }

        AuditEntryController::afterDelete(  $this->findModel($id), 'Vida y Obra / Cronología / Eliminar Hecho', $this->findModel($id)->id_hecho, $this->findModel($id)->titulo);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Hecho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Hecho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hecho::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
