<?php

namespace backend\controllers;

use backend\models\Comentario\Comentario;
use backend\models\Taller\TallerArchivo;
use Yii;
use backend\models\Taller\Taller;
use backend\models\Taller\TallerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;

/**
 * TallerController implements the CRUD actions for Taller model.
 */
class TallerController extends Controller
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
     * Lists all Taller models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TallerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_taller' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taller model.
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
     * Creates a new Taller model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Taller;
        $modelsArchivo = [new TallerArchivo];
        $x=0;
        if ($model->load(Yii::$app->request->post())) {
            $modelsArchivo = Model::createMultiple(TallerArchivo::classname());
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
                            if($x=0){
                                $modelArchivo->portada = 1;
                                $x++;
                            }
                            else{
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_taller = $model->id_taller;
                            if (! ($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Proyectos Alternativos / Proyectos Comunitarios / Crear Proyecto Comunitario - Archivo Asociado', $model->id_taller, $model->nombre, 'Insertar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Proyectos Alternativos / Proyectos Comunitarios / Crear Proyecto Comunitario', $model->id_taller, $model->nombre);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new TallerArchivo] : $modelsArchivo,
        ]);



    }

    /**
     * Updates an existing Taller model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);
        $modelsArchivo= TallerArchivo::find()->where(['id_taller' => $model->id_taller ])->all();    
        

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', 'id');
            $modelsArchivo = Model::createMultiple(TallerArchivo::classname(), $modelsArchivo);
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
                            TallerArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {
                            $modelArchivo->id_taller = $model->id_taller;
                            if (! ($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', $model->id_taller, $model->nombre, 'Modificar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario', $model->id_taller, $model->nombre);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new TallerArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing Taller model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $comentarios = Comentario::find()->where(['tabla' => 'taller', 'id_tabla' => $id])->all();
        $eliminar = Comentario::find()->where(['tabla' => 'taller', 'id_tabla' => $id])->all();
        foreach ($comentarios as $comentario) {
            for ($x = 0; $x <= 7; $x++) {
                $primeros = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $comentario->id])->all();
                $eliminar = array_merge($eliminar, $primeros);
                foreach ($primeros as $primero) {
                    $segundos = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $primero->id])->all();
                    $eliminar = array_merge($eliminar, $segundos);
                    foreach ($segundos as $segundo){
                        $terceros = Comentario::find()->where(['tabla' => 'comentario', 'id_tabla' => $segundo->id])->all();
                        $eliminar = array_merge($eliminar, $terceros);
                    }
                }
            }
        }
        foreach ($eliminar as $e) {
            $e->delete();
        }

        AuditEntryController::afterDelete(  $this->findModel($id), 'Proyectos Alternativos / Proyectos Comunitarios / Eliminar Proyecto Comunitario', $this->findModel($id)->id_taller, $this->findModel($id)->nombre);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Taller model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Taller the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Taller::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
