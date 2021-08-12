<?php

namespace backend\controllers;

use backend\models\User\AuthAssignment;
use backend\models\User\AuthItemChild;
use backend\models\User\AuthItemChildSpecial;
use Yii;
use backend\models\User\AuthItem;
use backend\models\User\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $searchModel->type = 1; // initial filter don't work
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->rol = ArrayHelper::map(AuthItemChild::find()->where(['parent'=> $model->name])->all(), 'child', 'child');
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();

            if (is_array($model->rol)) {
                foreach ($model->rol as $rol) {
                    $rolTemp = new AuthItemChild();
                    $rolTemp->parent = $model->name;
                    $rolTemp->child = $rol;
                    $rolTemp->save();
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->rol = ArrayHelper::map(AuthItemChild::find()->where(['parent'=> $model->name])->all(), 'child', 'child');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if (is_array($model->rol)) {
                $array = ArrayHelper::map(AuthItemChild::find()->where(['parent'=> $model->name])->all(), 'child', 'child');
                foreach ($array as $rolDelete){
                    $delete = AuthItemChild::find()->where(['parent'=>$model->name])->one();
                    $delete->delete();

                };

                foreach ($model->rol as $rol) {
                    $rolTemp = new AuthItemChild();
                    $rolTemp->parent = $model->name;
                    $rolTemp->child = $rol;
                    $rolTemp->save();
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
