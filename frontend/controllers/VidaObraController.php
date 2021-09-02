<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use yii\filters\VerbFilter;

/**
 * VidaObraController.
 */
class VidaObraController extends Controller
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

    public function actionIndex()
    {

        return $this->render("index");
    }

}
