<?php

namespace backend\controllers;

use Yii;
use backend\models\Escrito\EscritoArchivo;
use backend\models\Escrito\EscritoArchivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Archivo\Archivo;
/**
 * EscritoArchivoController implements the CRUD actions for EscritoArchivo model.
 */
class EscritoArchivoController extends Controller
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
     * Lists all EscritoArchivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EscritoArchivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EscritoArchivo model.
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
     * Creates a new EscritoArchivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $model = new EscritoArchivo();


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $escritoarchivos = new EscritoArchivo();
            $escritoarchivos = EscritoArchivo::find()->where(['id_escrito' => $model->id_escrito ])->all();

            if(count($escritoarchivos) >= 3){

            Yii::$app->session->setFlash('error','No es posible asignarle a un mismo escrito m??s de tres archivos.');
            return $this->redirect(['escrito/view', 'id' => $model->id_escrito]);

            }

            if ($model->portada == 1) {
                $archivo = new Archivo();
                $archivo = Archivo::find()->where(['id_archivo' => $model->id_archivo ])->one();
            
                foreach ($escritoarchivos as $not) {
                    if ($not->portada == 1 || $archivo->tipo == 1) {
                                Yii::$app->session->setFlash('error','Un escrito solo puede tener una imagen de portada.');
                                return $this->redirect(['escrito/view', 'id' => $model->id_escrito]);
                            }        
                }
            }


            $model->save();
            return $this->redirect(['escrito/view', 'id' => $model->id_escrito]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);



    }

    /**
     * Updates an existing EscritoArchivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EscritoArchivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id2)
    {
        $archivo = new EscritoArchivo();
        $archivo = EscritoArchivo::find()->where(['id_escrito' => $id2, 'id_archivo' => $id])->one();
        $archivo->delete();
        return $this->redirect(['escrito/view', 'id' => $id2]);

    }

    /**
     * Finds the EscritoArchivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EscritoArchivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EscritoArchivo::findOne($id)) !== null) {
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
        $log->audit_entry_operation = 'Eliminar';
        $log->audit_entry_model_id = $id;
        $nombre = \backend\models\User\User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = 'EscritoArchivo';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new \yii\db\Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }
}
