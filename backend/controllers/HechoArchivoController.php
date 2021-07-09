<?php

namespace backend\controllers;

use Yii;
use backend\models\Hecho\HechoArchivo;
use backend\models\Hecho\HechoArchivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Archivo\Archivo;

/**
 * HechoArchivoController implements the CRUD actions for HechoArchivo model.
 */
class HechoArchivoController extends Controller
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
     * Lists all HechoArchivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HechoArchivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HechoArchivo model.
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
     * Creates a new HechoArchivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new HechoArchivo();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $archivos = new HechoArchivo();
            $archivos= HechoArchivo::find()->where(['id_hecho' => $model->id_hecho ])->all();

            if(count($archivos) >= 3){

            Yii::$app->session->setFlash('error','No es posible asignarle a un mismo hecho más de tres archivos.');
            return $this->redirect(['hecho/view', 'id' => $model->id_hecho]);

            }

            if ($model->portada == 1) {
                $archivo = new Archivo();
                $archivo = Archivo::find()->where(['id_archivo' => $model->id_archivo ])->one();
            
                foreach ($archivos as $not) {
                    if ($not->portada == 1 || $archivo->tipo == 1) {
                                Yii::$app->session->setFlash('error','Un hecho solo puede tener una imagen de portada.');
                                return $this->redirect(['hecho/view', 'id' => $model->id_hecho]);
                            }        
                }
            }


            $model->save();
            return $this->redirect(['hecho/view', 'id' => $model->id_hecho]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Deletes an existing HechoArchivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $id2)
    {
       $archivo = new HechoArchivo();
        $archivo = HechoArchivo::find()->where(['id_hecho' => $id2, 'id_archivo' => $id])->one();
        $archivo->delete();
        return $this->redirect(['hecho/view', 'id' => $id2]);
    }

    /**
     * Finds the HechoArchivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HechoArchivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HechoArchivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
