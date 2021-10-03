<?php

namespace backend\controllers;

use backend\models\ProductoAudiovisual\ProductoAudiovisual;
use Yii;
use backend\models\ProductoAudiovisual\TipoProducto;
use backend\models\ProductoAudiovisual\TipoProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoProductoController implements the CRUD actions for TipoProducto model.
 */
class TipoProductoController extends Controller
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
     * Lists all TipoProducto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoProducto model.
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
     * Creates a new TipoProducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TipoProducto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            AuditEntryController::afterInsert($model, 'Administración / Géneros de Productos Audiovisuales / Crear Género de Producto Audiovisual', $model->id, $model->tipo_producto);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoProducto model.
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
     * Deletes an existing TipoProducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $deleted = true;
        $temporal12 = ProductoAudiovisual::find()->where(['tipo' => $id])->all();
        foreach ($temporal12 as $t12) {
            $deleted = false;
        }


        if ($deleted == true) {
            AuditEntryController::afterDelete(  $this->findModel($id), 'Administración / Géneros de Productos Audiovisuales / Eliminar Género de Producto Audiovisual', $this->findModel($id)->id, $this->findModel($id)->tipo_producto);
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'No se puede eliminar un Género que esté asociado a al menos un Producto Audiovisual.');
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the TipoProducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TipoProducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TipoProducto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
