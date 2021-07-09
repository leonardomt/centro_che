<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Correspondencia\Correspondencia;
use frontend\models\Correspondencia\CorrespondenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CorrespondenciaController implements the CRUD actions for Correspondencia model.
 */
class CorrespondenciaController extends Controller
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
     * Lists all Correspondencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $table = new Correspondencia;
        $model = $table->find()->all();
        return $this->render("index", ["model" => $model]);
    }

    /**
     * Displays a single Correspondencia model.
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
     * Finds the Correspondencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Correspondencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Correspondencia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
