<?php

namespace backend\controllers;

use Yii;
use backend\models\Escrito\Escrito;
use backend\models\Escrito\EscritoArchivo;
use backend\models\Escrito\EscritoSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/**
 * EscritoController implements the CRUD actions for Escrito model.
 */
class EscritoController extends Controller
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
     * Lists all Escrito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EscritoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Escrito model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
        ]);
    }

    /**
     * Creates a new Escrito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {



        $modelEscrito = new Escrito;
        $modelsArchivo = [new EscritoArchivo];
        $x=0;
        if ($modelEscrito->load(Yii::$app->request->post())) {
            $modelsArchivo = Model::createMultiple(EscritoArchivo::classname());
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsArchivo),
                    ActiveForm::validate($modelEscrito)
                );
            }
// validate all models
            $valid = $modelEscrito->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelEscrito->save(false)) {
                        foreach ($modelsArchivo as $modelArchivo) {
                            if($x=0){
                                $modelArchivo->portada = 1;
                                $x++;
                            }
                            else{
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_escrito = $modelEscrito->id_escrito;
                            if (! ($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $modelEscrito,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new EscritoArchivo] : $modelsArchivo,
        ]);








    }

    /**
     * Updates an existing Escrito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $modelEscrito = $this->findModel($id);
        $modelsArchivo = new EscritoArchivo();
        $modelsArchivo= EscritoArchivo::find()->where(['id_escrito' => $modelEscrito->id_escrito ])->all();    
        

        if ($modelEscrito->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsArchivo, 'id_escrito_archivo', 'id_escrito_archivo');
            $modelsArchivo = Model::createMultiple(EscritoArchivo::classname(), $modelsArchivo);
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsArchivo, 'id_escrito_archivo', 'id_escrito_archivo')));

            // validate all models
            $valid = $modelEscrito->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelEscrito->save(false)) {
                        if (!empty($deletedIDs)) {
                            EscritoArchivo::deleteAll(['id_escrito' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {
                            $modelArchivo->id_escrito = $modelEscrito->id_escrito;
                            $modelArchivo->portada =1;
                            if (! ($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $modelEscrito,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new EscritoArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Deletes an existing Escrito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $temporal9 = new EscritoArchivo();
        $temporal9 = EscritoArchivo::find()->where(['id_escrito' => $this->findModel($id)->id_escrito])->all();
        foreach ($temporal9 as $t9){
            $t9->delete();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);


    
    }

    /**
     * Finds the Escrito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Escrito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Escrito::findOne($id)) !== null) {
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
        $log->audit_entry_model_name = 'Escrito';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }
}
