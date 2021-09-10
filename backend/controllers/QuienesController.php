<?php

namespace backend\controllers;

use backend\models\Quienes\QuienesArchivo;
use Yii;
use backend\models\Quienes\Quienes;
use backend\models\Quienes\QuienesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * QuienesController implements the CRUD actions for Quienes model.
 */
class QuienesController extends Controller
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
     * Lists all Quienes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuienesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quienes model.
     * @param integer $id
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
     * Creates a new Quienes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quienes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Quienes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelArchivos = new QuienesArchivo();
        $model = $this->findModel($id);

        Yii::$app->request->enableCsrfValidation = false;
        $this->enableCsrfValidation = false;

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $modelArchivos->file = UploadedFile::getInstances($modelArchivos, 'file');
            foreach ($modelArchivos->file as $file) {
                $upload = new QuienesArchivo();
                $imageName = date('Y-m-d') . rand(0, 99999);
                $upload->url = 'quienes_somos/' . $imageName . '.' . $file->extension;
                $upload->file = $file;
                $upload->save();


                for ($x = 0; $x <= 7; $x++) {
                    $images = QuienesArchivo::find()->all();
                    if (count($images) >= 6) {
                        $images[0]->delete();
                    }
                }

                $file->saveAs('../../frontend/web/quienes_somos/' . $imageName . '.' . $file->extension);


            }
            return $this->redirect(['view', 'id' => 1]);
        }


        return $this->render('update', [
            'model' => $model,
            'modelArchivos' => $modelArchivos,
        ]);
    }

    /**
     * Deletes an existing Quienes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quienes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quienes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quienes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function afterDeleted($id)
    {
        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();

        } catch (Exception $e) { //If we have no user object, this must be a command line program
            $userId = self::NO_USER_ID;
        }

        $log = new \ruturajmaniyar\mod\audit\models\AuditEntry();
        $log->audit_entry_old_value = 'N/A';
        $log->audit_entry_new_value = 'N/A';
        $log->audit_entry_operation = 'DELETE';
        $log->audit_entry_model_id = $id;
        $nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = 'Quienes';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }
}
