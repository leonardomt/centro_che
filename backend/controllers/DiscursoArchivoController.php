<?php

namespace backend\controllers;

use Yii;
use backend\models\Discurso\DiscursoArchivo;
use backend\models\Discurso\DiscursoArchivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Archivo\Archivo;

/**
 * DiscursoArchivoController implements the CRUD actions for DiscursoArchivo model.
 */
class DiscursoArchivoController extends Controller
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
     * Lists all DiscursoArchivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiscursoArchivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiscursoArchivo model.
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
     * Creates a new DiscursoArchivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new DiscursoArchivo();


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $archivos = new DiscursoArchivo();
            $archivos= DiscursoArchivo::find()->where(['id_discurso' => $model->id_discurso ])->all();

            if(count($archivos) >= 3){

            Yii::$app->session->setFlash('error','No es posible asignarle a un mismo discurso o entrevista más de tres archivos.');
            return $this->redirect(['discurso/view', 'id' => $model->id_discurso]);

            }

            if ($model->portada == 1) {
                $archivo = new Archivo();
                $archivo = Archivo::find()->where(['id_archivo' => $model->id_archivo ])->one();
            
                foreach ($archivos as $not) {
                    if ($not->portada == 1 || $archivo->tipo == 1) {
                                Yii::$app->session->setFlash('error','Un discurso o entrevista solo puede tener una imagen de portada.');
                                return $this->redirect(['discurso/view', 'id' => $model->id_discurso]);
                            }        
                }
            }


            $model->save();
            return $this->redirect(['discurso/view', 'id' => $model->id_discurso]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing DiscursoArchivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DiscursoArchivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DiscursoArchivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DiscursoArchivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DiscursoArchivo::findOne($id)) !== null) {
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
        $log->audit_entry_model_name = 'DiscursoArchivo';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }
}
