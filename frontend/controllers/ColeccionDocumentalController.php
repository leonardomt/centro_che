<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ColeccionDocumental\ColeccionDocumental;
use frontend\models\ColeccionDocumental\ColeccionDocumentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColeccionDocumentalController implements the CRUD actions for ColeccionDocumental model.
 */
class ColeccionDocumentalController extends Controller
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
     * Lists all ColeccionDocumental models.
     * @return mixed
     */
    public function actionIndex()
    {
        $table = new ColeccionDocumental;


        $model = $table->find()->all();
        return $this->render("index", ["model" => $model]);
    }

    /**
     * Displays a single ColeccionDocumental model.
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
     * Finds the ColeccionDocumental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ColeccionDocumental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ColeccionDocumental::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
