<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CursoOnline\CursoOnline;
use frontend\models\CursoOnline\CursoOnlineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursoOnlineController implements the CRUD actions for CursoOnline model.
 */
class CursoOnlineController extends Controller
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
     * Lists all CursoOnline models.
     * @return mixed
     */
    public function actionIndex()
    {
        $table = new CursoOnline;


        $model = $table->find()->all();
        return $this->render("index", ["model" => $model]);
    }

    /**
     * Displays a single CursoOnline model.
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
     * Finds the CursoOnline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CursoOnline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CursoOnline::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
