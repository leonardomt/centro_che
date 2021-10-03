<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\Galeria\GaleriaVoArchivo;
use Yii;
use backend\models\Galeria\GaleriaVo;
use backend\models\Galeria\GaleriaVoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;

/**
 * GaleriaVOController implements the CRUD actions for GaleriaVO model.
 */
class GaleriaVOController extends Controller
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
     * Lists all GaleriaVO models.
     * @return mixed
     */
    public function actionIndex($tipo)
    {
        $searchModel = new GaleriaVoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['tipo'=>$tipo]);
        $dataProvider->setSort([
            'defaultOrder' => ['id_galeria_vo' => SORT_DESC],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Displays a single GaleriaVO model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $tipo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tipo' => $tipo,
        ]);
    }

    /**
     * Creates a new GaleriaVO model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tipo)
    {
        $model = new GaleriaVo();
        $modelsArchivo = [new GaleriaVoArchivo()];
        $x = 0;

        if ($model->load(Yii::$app->request->post())) {

            $modelsArchivo = Model::createMultiple(GaleriaVoArchivo::classname());
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            foreach ($modelsArchivo as $modelArchivo) {

                $archivo = Archivo::findOne(['id_archivo' => $modelArchivo->id_archivo]);
                $model->id_archivo = $archivo->url_archivo;
                $model->tipo_archivo = $archivo->tipo_archivo;
            }
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


                            $modelArchivo->id_galeria_vo = $model->id_galeria_vo;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Vida y Obra / Galería / Insertar Archivo', $model->id_galeria_vo, $model->id_archivo);
                        return $this->redirect(['index', 'tipo'=>$tipo]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new GaleriaVoArchivo] : $modelsArchivo,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Updates an existing GaleriaVO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $tipo)
    {
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);
        $x = 0;
        $modelsArchivo = GaleriaVoArchivo::find()->where(['id_galeria_vo' => $model->id_galeria_vo])->all();

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(GaleriaVoArchivo::classname(), $modelsArchivo);
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsArchivo, 'id', 'id')));

            foreach ($modelsArchivo as $modelArchivo) {

                $archivo = Archivo::findOne(['id_archivo' => $modelArchivo->id_archivo]);
                $model->id_archivo = $archivo->url_archivo;
                $model->tipo_archivo = $archivo->tipo_archivo;
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            GaleriaVoArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {

                            $modelArchivo->id_galeria_vo = $model->id_galeria_vo;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Vida y Obra / Galería / Insertar Archivo', $model->id_galeria_vo, $model->id_archivo);
                        return $this->redirect(['index', 'tipo'=> $tipo]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new GaleriaVoArchivo] : $modelsArchivo,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Deletes an existing GaleriaVO model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $tipo)
    {
        AuditEntryController::afterDelete(  $this->findModel($id), 'Vida y Obra / Galería / Insertar Archivo', $this->findModel($id)->id_galeria_vo, $this->findModel($id)->id_archivo);

        $this->findModel($id)->delete();

        return $this->redirect(['index' , 'tipo' => $tipo]);
    }

    /**
     * Finds the GaleriaVO model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GaleriaVO the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GaleriaVO::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
