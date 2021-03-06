<?php

namespace backend\controllers;

use Yii;
use backend\models\Revista\Paradigma;
use backend\models\Revista\ParadigmaSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Revista\ParadigmaArchivo;
use backend\models\Revista\ParadigmaArchivoSearch;

/**
 * ParadigmaController implements the CRUD actions for Paradigma model.
 */
class ParadigmaController extends Controller
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
     * Lists all Paradigma models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParadigmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paradigma model.
     * @param integer $id
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
     * Creates a new Paradigma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paradigma();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paradigma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $modelArchivos = new ParadigmaArchivo();
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);

        Yii::$app->request->enableCsrfValidation = false;
        $this->enableCsrfValidation = false;

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $modelArchivos->file = UploadedFile::getInstances($modelArchivos, 'file');
            foreach ($modelArchivos->file as $file) {
                $upload = new ParadigmaArchivo();
                $imageName = date('Y-m-d') . rand(0, 99999);
                $upload->url = 'paradigma/' . $imageName . '.' . $file->extension;
                $upload->file = $file;
                $upload->save();


                for ($x = 0; $x <= 10; $x++) {
                    $images = ParadigmaArchivo::find()->all();
                    ArrayHelper::multisort($images, ['id'], [SORT_ASC]);
                    if (count($images) >= 6) {
                        $images[0]->delete();
                    }
                }

                $file->saveAs('../../frontend/web/paradigma/' . $imageName . '.' . $file->extension);


            }
            AuditEntryController::afterUpdate( $oldmodel, $model, 'Inicio / Paradigma / Paradigma - Inicio / Modificar Paradigma - Inicio', $model->id, 'Inicio');
            return $this->redirect(['view', 'id' => 1]);
        }


        return $this->render('update', [
            'model' => $model,
            'modelArchivos' => $modelArchivos,
        ]);
    }

    /**
     * Deletes an existing Paradigma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Paradigma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paradigma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paradigma::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
