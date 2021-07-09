<?php

namespace backend\controllers;

use backend\models\Archivo\ArchivoSearch;
use backend\models\Archivo\Archivo;
use Yii;
use backend\models\Articulo\ArticuloArchivo;
use backend\models\Articulo\ArticuloArchivoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticuloArchivoController implements the CRUD actions for ArticuloArchivo model.
 */
class ArticuloArchivoController extends Controller
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
     * Lists all ArticuloArchivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticuloArchivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticuloArchivo model.
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
     * Creates a new ArticuloArchivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_articulo)
    {
        $model = new ArticuloArchivo();



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_articulo_archivo]);
        }

        $query = new \yii\db\Query;
        $query->select('*')
            ->from('archivo');
        $query->createCommand();

        $searchmodelArchivo = new ArchivoSearch();
        $modelArchivo = new Archivo();
        $dataproviderArchivo = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('create', [
            'model' => $model,
            'id_articulo' => $id_articulo,
            'dataproviderArchivo'=>$dataproviderArchivo,
            'searchmodelArchivo'=>$searchmodelArchivo,
            'modelArchivo'=>$modelArchivo,
        ]);
    }

    /**
     * Updates an existing ArticuloArchivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_articulo_archivo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArticuloArchivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id2)
    {
        
        $archivo = new ArticuloArchivo();
        $archivo = ArticuloArchivo::find()->where(['id_articulo' => $id2, 'id_archivo' => $id])->one();
        $archivo->delete();
        return $this->redirect(['libro/view', 'id' => $id2]);
  
    }

    /**
     * Finds the ArticuloArchivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ArticuloArchivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticuloArchivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
