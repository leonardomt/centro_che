<?php

namespace frontend\controllers;

use Yii;
use backend\models\Comentario\Comentario;
use backend\models\Comentario\ComentarioSearch;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
    public function actionCreate($tabla, $id_tabla, $back, $back_id)
    {
        $model = new Comentario();

        if ($model->load(Yii::$app->request->post())){
            $model->fecha = new Expression('NOW()');
            $seccion = "";
            if($model->tabla == "noticia" || $model->tabla == "revista" || $model->tabla == "quienes"){
                $seccion = "Inicio";
            }
            if($model->tabla == "linea_investigacion" || $model->tabla == "investigacion" || $model->tabla == "articulo" || $model->tabla == "gestion_documental" || $model->tabla == "coleccion_documental" || $model->tabla == "proyecto" || $model->tabla == "libro" || $model->tabla == "curso_online" || $model->tabla == "clase"){
                $seccion = "Coordinación Académica";
            }
            if($model->tabla == "taller" || $model->tabla == "exposicion" || $model->tabla == "producto_audiovisual"|| $model->tabla == "otros"){
                $seccion = "Proyectos Alternativos";
            }
            if($model->tabla == "hecho" || $model->tabla == "correspondencia" || $model->tabla == "escrito" || $model->tabla == "discurso" || $model->tabla == "testimonio"){
                $seccion = "Vida y Obra";
            }
            if($model->tabla == 'comentario'){
                $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id'=> $model->id_tabla])->one();
                for ($x=0; $x<=7; $x++){
                    if($modelpadre->tabla == 'noticia' || $modelpadre->tabla == 'revista' || $modelpadre->tabla == 'quienes'){
                        $seccion = "Inicio";
                        break;
                    }

                    if($modelpadre->tabla == 'linea_investigacion' || $modelpadre->tabla == 'investigacion' ||$modelpadre->tabla == 'articulo' || $modelpadre->tabla == "gestion_documental" || $modelpadre->tabla == "coleccion_documental" || $modelpadre->tabla == "proyecto" || $modelpadre->tabla == "libro" || $modelpadre->tabla == "curso_online" || $modelpadre->tabla == "clase"){
                        $seccion = "Coordinación Académica";
                        break;
                    }

                    if($modelpadre->tabla == "taller" || $modelpadre->tabla == "exposicion" || $modelpadre->tabla == "producto_audiovisual"|| $modelpadre->tabla == "otros"){
                        $seccion = "Proyectos Alternativos";
                        break;
                    }
                    if($modelpadre->tabla == "hecho" || $modelpadre->tabla == "correspondencia" || $modelpadre->tabla == "escrito" || $modelpadre->tabla == "discurso" || $modelpadre->tabla == "testimonio"){
                        $seccion = "Vida y Obra";
                        break;
                    }
                    $modelpadre = \backend\models\Comentario\Comentario::find()->where(['id'=> $modelpadre->id_tabla])->one();
                }
            }
            $model->seccion = $seccion;
         if( $model->save()) {
            return $this->redirect([$back.'/view', 'id' => $back_id]);
        }}

        return $this->render('create', [
            'model' => $model,
            'tabla' => $tabla,
            'id' => $id_tabla,
            'back' => $back,
            'back_id' => $back_id,
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
        $this->findModel($id)->delete();
        $this->afterDeleted($id);
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
