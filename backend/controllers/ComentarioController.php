<?php

namespace backend\controllers;

use Yii;
use backend\models\Comentario\Comentario;
use backend\models\Comentario\ComentarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * ComentarioController implements the CRUD actions for Comentario model.
 */
class ComentarioController extends Controller
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
     * Lists all Comentario models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ComentarioSearch();
        $searchModel->revisado = 0; // initial filter don't work
        $searchModel->publico = 0; // initial filter don't work
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModel1 = new ComentarioSearch();
        $searchModel1->revisado = 1; // initial filter don't work
        $searchModel1->publico = 1; // initial filter don't work
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);

        $searchModel2 = new ComentarioSearch();
        $searchModel2->publico = 0; // initial filter don't work
        $searchModel2->revisado = 1; // initial filter don't work
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
        ]);
    }

    /**
     * Displays a single Comentario model.
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
     * Creates a new Comentario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_c)
    {
        $model = new Comentario();

        if ($model->load(Yii::$app->request->post())) {
            $padre = $this->findModel($id_c);
            $model->fecha = new Expression('NOW()');
            $model->seccion = $padre->seccion;
            $model->tabla = 'comentario';
            $model->respuesta = 1;
            $model->id_tabla = $padre->id;
            $padre->save();
        };


        if ($model->save()) {
            $log = AuditEntryController::afterInsert($model, 'Comentarios / Responder como Instituci??n', $model->id, $model->alias);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'id_c' => $id_c,
        ]);
    }

    /**
     * Updates an existing Comentario model.
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
            $log = AuditEntryController::afterUpdate( $oldmodel, $model, 'Comentarios / Gesti??n de Comentarios', $model->id, $model->alias);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comentario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->publico = 0;
        $model->revisado = 1;
        $model->save();


        return $this->redirect(['index']);
    }

    public function actionAprobar($id)
    {
        $model = $this->findModel($id);
        $model->publico = 1;
        $model->revisado = 1;
        $model->save();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Comentario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Comentario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comentario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
