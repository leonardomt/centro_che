<?php

namespace backend\controllers;

use backend\models\Quienes\QuienesDetalleArchivo;
use backend\models\Quienes\TrabajadorSearch;
use Yii;
use backend\models\Quienes\QuienesDetalle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * QuienesDetalleController implements the CRUD actions for QuienesDetalle model.
 */
class QuienesDetalleController extends Controller
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
     * Displays a single QuienesDetalle model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelT = new TrabajadorSearch();
        $dataProviderT = $searchModelT->search(Yii::$app->request->queryParams);



        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModelT' => $searchModelT,
            'dataProviderT' => $dataProviderT,
        ]);
    }

    /**
     * Creates a new QuienesDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuienesDetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing QuienesDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelArchivos = new QuienesDetalleArchivo();
        $model = $this->findModel($id);

        Yii::$app->request->enableCsrfValidation = false;
        $this->enableCsrfValidation = false;

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $modelArchivos->file = UploadedFile::getInstances($modelArchivos, 'file');
            foreach ($modelArchivos->file as $file) {
                $upload = new QuienesDetalleArchivo();
                $imageName = date('Y-m-d') . rand(0, 99999);
                $upload->url = 'quienes_somos/' . $imageName . '.' . $file->extension;
                $upload->file = $file;
                $upload->save();


                for ($x = 0; $x <= 7; $x++) {
                    $images = QuienesDetalleArchivo::find()->all();
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
     * Deletes an existing QuienesDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Finds the QuienesDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuienesDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuienesDetalle::findOne($id)) !== null) {
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
        $log->audit_entry_operation = 'ELIMINAR';
        $log->audit_entry_model_id = $id;
        $nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = 'QuienesDetalle';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new \yii\db\Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }
}
