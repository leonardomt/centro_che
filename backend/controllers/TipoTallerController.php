<?php

namespace backend\controllers;

use backend\models\Taller\Taller;
use backend\models\Taller\TallerArchivo;
use Yii;
use backend\models\taller\TipoTaller;
use backend\models\taller\TipoTallerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoTallerController implements the CRUD actions for TipoTaller model.
 */
class TipoTallerController extends Controller
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
     * Lists all TipoTaller models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoTallerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoTaller model.
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
     * Creates a new TipoTaller model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoTaller();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            AuditEntryController::afterInsert($model, 'Administración / Tipos de Proyectos Comunitarios / Crear Tipo de Proyecto Comunitario', $model->id, $model->tipo);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoTaller model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing TipoTaller model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $deleted = true;
        $temporal12 = Taller::find()->where(['tipo' => $id])->all();
        foreach ($temporal12 as $t12) {
            $deleted = false;
        }


        if ($deleted == true) {
            AuditEntryController::afterDelete(  $this->findModel($id), 'Administración / Tipos de Proyectos Comunitarios / Eliminar Tipo de Proyecto Comunitario', $this->findModel($id)->id, $this->findModel($id)->tipo);
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'No se puede eliminar un Tipo que esté asociado a al menos un Proyecto Comunitario.');
            return $this->redirect(['index']);
        }


    }

    /**
     * Finds the TipoTaller model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TipoTaller the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipoTaller::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
