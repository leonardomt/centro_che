<?php

namespace backend\controllers;

use Yii;
use backend\models\AuditEntrySearch;
use yii\web\Controller;
/**
 * AuditEntryController implements the CRUD actions for AuditEntry model.
 */
class AuditEntryController extends Controller
{
    /**
     * Lists all AuditEntry models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditEntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
