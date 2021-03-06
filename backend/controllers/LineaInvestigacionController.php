<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\Investigacion\Investigacion;
use backend\models\LineaInvestigacion\LineaInvestigacionArchivo;
use Yii;
use backend\models\LineaInvestigacion\LineaInvestigacion;
use backend\models\LineaInvestigacion\LineaInvestigacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;


/**
 * LineaInvestigacionController implements the CRUD actions for LineaInvestigacion model.
 */
class LineaInvestigacionController extends Controller
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
     * Lists all LineaInvestigacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LineaInvestigacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_linea_investigacion' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LineaInvestigacion model.
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
     * Creates a new LineaInvestigacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LineaInvestigacion();
        $modelsArchivo = [new LineaInvestigacionArchivo];
        $x = 0;
        if ($model->load(Yii::$app->request->post())) {
            $modelsArchivo = Model::createMultiple(LineaInvestigacionArchivo::classname());
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
                                    Yii::$app->session->setFlash('error', 'Una L??nea de Investigaci??n solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new LineaInvestigacionArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_linea_investigacion = $model->id_linea_investigacion;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Coordinaci??n Acad??mica / L??neas de Investigaci??n / Crear L??nea de Investigaci??n - Archivo Asociado', $model->id_linea_investigacion, $model->nombre_linea, 'Insertar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Coordinaci??n Acad??mica / L??neas de Investigaci??n / Crear L??nea de Investigaci??n', $model->id_linea_investigacion, $model->nombre_linea);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new LineaInvestigacionArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Updates an existing LineaInvestigacion model.
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
        $modelsArchivo = LineaInvestigacionArchivo::find()->where(['id_linea_investigacion' => $model->id_linea_investigacion])->all();

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(LineaInvestigacionArchivo::classname(), $modelsArchivo);
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
                            LineaInvestigacionArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = new Archivo();
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'Una L??nea de Investigaci??n solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'update', 'model' => $model, 'id'=>$model->id_linea_investigacion,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new LineaInvestigacionArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }


                            $modelArchivo->id_linea_investigacion = $model->id_linea_investigacion;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Coordinaci??n Acad??mica / L??neas de Investigaci??n / Modificar L??nea de Investigaci??n - Archivo Asociado', $model->id_linea_investigacion, $model->nombre_linea, 'Modificar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Coordinaci??n Acad??mica / L??neas de Investigaci??n / Modificar L??nea de Investigaci??n', $model->id_linea_investigacion, $model->nombre_linea);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new LineaInvestigacionArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing LineaInvestigacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $temporal = Investigacion::find()->where(['id_linea_investigacion' => $this->findModel($id)->id_linea_investigacion])->all();
        if (count($temporal) > 0) {
            Yii::$app->session->setFlash('error', 'La L??nea de Investigaci??n tiene Investigaciones asociadas, no puede ser eliminada.');
            $searchModel = new LineaInvestigacionSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        $temporal8 = new LineaInvestigacionArchivo();
        $temporal8 = LineaInvestigacionArchivo::find()->where(['id_linea_investigacion' => $this->findModel($id)->id_linea_investigacion])->all();
        foreach ($temporal8 as $t8){
            $t8->delete();
        }



        $this->findModel($id)->delete();
        AuditEntryController::afterDelete(  $this->findModel($id), 'Coordinaci??n Acad??mica / L??neas de Investigaci??n / Eliminar L??nea de Investigaci??n', $this->findModel($id)->id_linea_investigacion, $this->findModel($id)->nombre_linea);
        return $this->redirect(['index']);
    }

    /**
     * Finds the LineaInvestigacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LineaInvestigacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LineaInvestigacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
