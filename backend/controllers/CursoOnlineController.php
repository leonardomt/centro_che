<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use backend\models\CursoOnline\CursoOnlineArchivo;
use Yii;
use backend\models\CursoOnline\CursoOnline;
use backend\models\CursoOnline\Clase;
use backend\models\CursoOnline\CursoOnlineSearch;
use Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\Expression;

/**
 * CursoOnlineController implements the CRUD actions for CursoOnline model.
 */
class CursoOnlineController extends Controller
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
     * Lists all CursoOnline models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoOnlineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_curso' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CursoOnline model.
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
     * Creates a new CursoOnline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CursoOnline();
        $modelsClase = [new Clase];
        $x = 0;
        if ($model->load(Yii::$app->request->post())) {
            
            $imageName = $model->titulo;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('../../frontend/web/pdf/' . $imageName . '.' . $model->file->extension);
            $model->pdf = 'pdf/' . $imageName . '.' . $model->file->extension;

            $modelsClase = Model::createMultiple(Clase::classname());
            Model::loadMultiple($modelsClase, Yii::$app->request->post());
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsClase),
                    ActiveForm::validate($model)
                );
            }
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsClase) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsClase as $modelClase) {
                            $modelClase->id_curso = $model->id_curso;
                            $modelClase->revisado = 1;
                            $modelClase->publico = 1;
                            if (!($flag = $modelClase->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $log = AuditEntryController::afterInsert($model, 'Coordinación Académica / Cursos Online / Crear Curso Online', $model->id_curso, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsClase' => (empty($modelsClase)) ? [new Clase] : $modelsClase,
        ]);
    }

    /**
     * Updates an existing CursoOnline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);
        $modelsClase = Clase::find()->where(['id_curso' => $model->id_curso])->all();

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsClase, 'id', 'id');
            $modelsClase = Model::createMultiple(Clase::classname(), $modelsClase);
            Model::loadMultiple($modelsClase, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsClase, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsClase) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Clase::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsClase as $modelClase) {
                            $modelClase->id_curso = $model->id_curso;
                            $modelClase->revisado = 1;
                            $modelClase->publico = 1;
                            if (!($flag = $modelClase->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $log = AuditEntryController::afterUpdate( $oldmodel, $model, 'Coordinación Académica / Cursos Online / Modificar Curso Online', $model->id_curso, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsClase' => (empty($modelsClase)) ? [new Clase()] : $modelsClase,
        ]);
    }

    /**
     * Deletes an existing CursoOnline model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $temporal14 = CursoOnlineArchivo::find()->where(['id_curso_online' => $this->findModel($id)->id_curso])->all();
        foreach ($temporal14 as $t14) {
            $t14->delete();
        }

        $temporal = Clase::find()->where(['id_curso' => $this->findModel($id)->id_curso])->all();
        foreach ($temporal as $t) {
            $t->delete();
        }
        $log = AuditEntryController::afterDelete(  $this->findModel($id), 'Coordinación Académica / Cursos Online / Eliminar Curso Online', $this->findModel($id)->id_curso, $this->findModel($id)->titulo);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the CursoOnline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CursoOnline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CursoOnline::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionPdf($id) {
        $model = CursoOnline::findOne($id);

        // This will need to be the path relative to the root of your app.
        $filePath = '../../frontend/web/';
        // Might need to change '@app' for another alias
        $completePath = Yii::getAlias($filePath.'/'.$model->pdf);

        return Yii::$app->response->sendFile($completePath, $model->pdf);
    }


}
