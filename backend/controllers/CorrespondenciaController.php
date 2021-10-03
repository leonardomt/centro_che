<?php

namespace backend\controllers;

use backend\models\Correspondencia\CorrespondenciaArchivo;
use Yii;
use backend\models\Correspondencia\Correspondencia;
use backend\models\Correspondencia\CorrespondenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Archivo\Archivo;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;
/**
 * CorrespondenciaController implements the CRUD actions for Correspondencia model.
 */
class CorrespondenciaController extends Controller
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
     * Lists all Correspondencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CorrespondenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_correspondencia' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Correspondencia model.
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
     * Creates a new Correspondencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Correspondencia;
        $modelsArchivo = [new CorrespondenciaArchivo];
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
            $modelsArchivo = Model::createMultiple(CorrespondenciaArchivo::classname());
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
                                    Yii::$app->session->setFlash('error', 'Una Correspondencia solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new CorrespondenciaArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_correspondencia = $model->id_correspondencia;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $log = AuditEntryController::afterInsert($model, 'Vida y Obra / Correspondencia / Crear Correspondencia', $model->id_correspondencia, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new CorrespondenciaArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Updates an existing Correspondencia model.
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
        $modelsArchivo = CorrespondenciaArchivo::find()->where(['id_correspondencia' => $model->id_correspondencia])->all();
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
            $modelsArchivo = Model::createMultiple(CorrespondenciaArchivo::classname(), $modelsArchivo);
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
                            CorrespondenciaArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = new Archivo();
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Una Correspondencia solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'update', 'model' => $model,'id'=>$model->id_correspondencia,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new CorrespondenciaArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }


                            $modelArchivo->id_correspondencia = $model->id_correspondencia;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $log = AuditEntryController::afterUpdate( $oldmodel, $model, 'Vida y Obra / Correspondencia / Modificar Correspondencia', $model->id_correspondencia, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new CorrespondenciaArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing Correspondencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $temporal3 = CorrespondenciaArchivo::find()->where(['id_correspondencia' => $this->findModel($id)->id_correspondencia])->all();
        foreach ($temporal3 as $t3){
            $t3->delete();
        }

        $log = AuditEntryController::afterDelete(  $this->findModel($id), 'Vida y Obra / Correspondencia', $this->findModel($id)->id_correspondencia, $this->findModel($id)->titulo);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Correspondencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Correspondencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Correspondencia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
