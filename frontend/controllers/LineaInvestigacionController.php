<?php

namespace frontend\controllers;

use Yii;
use frontend\models\LineaInvestigacion\LineaInvestigacion;
use frontend\models\LineaInvestigacion\LineaInvestigacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LineaInvestigacionController implements the CRUD actions for LineaInvestigacion model.
 */
class LineaInvestigacionController extends Controller
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
     * Lists all LineaInvestigacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $table = new LineaInvestigacion;


        $model = $table->find()->all();
        return $this->render("index", ["model" => $model]);
    }

    /**
     * Displays a single LineaInvestigacion model.
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
     * Finds the LineaInvestigacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LineaInvestigacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LineaInvestigacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
