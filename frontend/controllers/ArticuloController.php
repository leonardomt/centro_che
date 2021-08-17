<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Articulo\Articulo;
use frontend\models\Articulo\ArticuloSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticuloController implements the CRUD actions for Articulo model.
 */
class ArticuloController extends Controller
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
     * Lists all Articulo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $table = new Articulo;


        $model = $table->find()->all();
        return $this->render("index", ["model" => $model]);
    }

    /**
     * Displays a single Articulo model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $bread= '<li class=\"breadcrumb-item\"><a href=\"'.Yii::$app->homeUrl.'\">Inicio</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
                    <li class=\"breadcrumb-item active\" aria-current=\"page\"><?= Html::encode($this->title) ?></li>';
        return $this->render('view', [
            'model' => $this->findModel($id),
            'bread' => $bread,
        ]);
    }


    /**
     * Finds the Articulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Articulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articulo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
