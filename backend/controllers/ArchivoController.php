<?php

namespace backend\controllers;

use backend\models\Archivo\TipoArchivo;
use backend\models\Exposicion\Exposicion;
use backend\models\Testimonio\Testimonio;
use backend\models\Testimonio\TestimonioArchivo;
use backend\models\User\User;
use ruturajmaniyar\mod\audit\behaviors\AuditEntryBehaviors;
use ruturajmaniyar\mod\audit\models\AuditEntry;
use Yii;
use backend\models\Archivo\Archivo;
use backend\models\Archivo\ArchivoSearch;
use backend\models\Articulo\ArticuloArchivo;
use backend\models\ColeccionDocumental\ColeccionDocumentalArchivo;
use backend\models\Correspondencia\CorrespondenciaArchivo;
use backend\models\CursoOnline\CursoOnlineArchivo;
use backend\models\Exposicion\ExposicionArchivo;
use backend\models\Hecho\HechoArchivo;
use backend\models\Homenaje\HomenajeArchivo;
use backend\models\Investigacion\InvestigacionArchivo;
use backend\models\LineaInvestigacion\LineaInvestigacionArchivo;
use backend\models\Noticia\NoticiaArchivo;
use backend\models\Proyecto\ProyectoArchivo;
use backend\models\Revista\RevistaArchivo;
use backend\models\Taller\TallerArchivo;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ArchivoController implements the CRUD actions for Archivo model.
 */
class ArchivoController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'auditEntryBehaviors' => [
                'class' => AuditEntryBehaviors::className()
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Archivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArchivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id_archivo' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Archivo model.
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
     * Creates a new Archivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->request->enableCsrfValidation = false;
        $model = new Archivo();
        $this->enableCsrfValidation = false;

        if ($model->load(Yii::$app->request->post())) {
            if (($model->year != null && ($model->month == null || $model->day ==null))  ||  (($model->year == null || $model->day ==null) && $model->month != null ) ||(($model->year == null || $model->month == null) && $model->day !=null)) {
                Yii::$app->session->setFlash('error', 'La fecha debe estar completa o no ser insertada');
                return $this->redirect([
                    'create',
                    'model' => $model,
                ]);
            }

            if ($model->year == null && $model->month == null && $model->day ==null){
                $model->fecha= null;
            }
            else {
                $model->fecha = $model->year.'-'.$model->month.'-'.$model->day;
                if($model->fecha > date('Y-m-d')){
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al día de hoy');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            };

            if (true) {
                $fecha = $model->fecha;
                if ($fecha != null) {
                    
                    if (($fecha < "1943-6-15") && ($fecha > "1928-06-13")) {
                        $model->etapa = "Infancia";
                    }
                    if (($fecha > "1943-06-14") && ($fecha < "1953-06-15")) {
                        $model->etapa = "Adolescencia";
                    }
                    if (($fecha > "1953-06-14") && ($fecha < "1958-06-15")) {
                        $model->etapa = "Adulto Joven";
                    }
                    if (($fecha > "1958-06-14") && ($fecha < "1967-10-10")) {
                        $model->etapa = "Adulto";
                    }
                    if ($fecha > "1967-10-9") {
                        $model->etapa = "Posterior a 1967";
                    }
                    if ($fecha < "1928-06-13") {
                        $model->etapa = "Anterior a 1928";
                    }
                }
                if ($fecha == null) {
                    $model->etapa = "No Definida";
                }

                $imageName = date('Y-m-d') . rand(0, 99999);
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file == null) {
                    Yii::$app->session->setFlash('error', 'No ha cargado ningún archivo.   '.$model->file);
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                };
                $model->file->saveAs('../../frontend/web/uploads/' . $imageName . '.' . $model->file->extension);
                $model->url_archivo = 'uploads/' . $imageName . '.' . $model->file->extension;

                if ($model->file->extension == 'png' || $model->file->extension == 'jpg' || $model->file->extension == 'gif' || $model->file->extension == 'jpeg') {
                    $model->tipo_archivo = 1;
                };

                if ($model->file->extension == 'mp3') {
                    $model->tipo_archivo = 2;
                };


                if ($model->file->extension == 'mp4') {
                    $model->tipo_archivo = 3;
                };
                $model->save();

                return $this->redirect(['index']);
            };
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Archivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->fecha != null){
            $model->year = date('Y', strtotime($model->fecha));
            $model->month = date('m', strtotime($model->fecha));
            $model->day = date('d', strtotime($model->fecha));
        }

        if ($model->load(Yii::$app->request->post())) {
            if (($model->year != null && ($model->month == null || $model->day ==null))  ||  (($model->year == null || $model->day ==null) && $model->month != null ) ||(($model->year == null || $model->month == null) && $model->day !=null)) {
                Yii::$app->session->setFlash('error', 'La fecha debe estar completa o no ser insertada');
                return $this->redirect([
                    'update', 'id'=>$id,
                    'model' => $model,
                ]);
            }

            if ($model->year == null && $model->month == null && $model->day ==null){
                $model->fecha= null;
            }
            else {
                $model->fecha = $model->year.'-'.$model->month.'-'.$model->day;
                if($model->fecha > date('Y-m-d')){
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al día de hoy');
                    return $this->redirect([
                        'update', 'id' => $id,
                        'model' => $model,
                    ]);
                }
            };
            $fecha = $model->fecha;
            if ($fecha != null) {

                if (($fecha < "1943-6-15") && ($fecha > "1928-06-13")) {
                    $model->etapa = "Infancia";
                }
                if (($fecha > "1943-06-14") && ($fecha < "1953-06-15")) {
                    $model->etapa = "Adolescencia";
                }
                if (($fecha > "1953-06-14") && ($fecha < "1958-06-15")) {
                    $model->etapa = "Adulto Joven";
                }
                if (($fecha > "1958-06-14") && ($fecha < "1967-10-10")) {
                    $model->etapa = "Adulto";
                }
                if ($fecha > "1967-10-9") {
                    $model->etapa = "Posterior a 1967";
                }
                if ($fecha < "1928-06-13") {
                    $model->etapa = "Anterior a 1928";
                }
            }
            if ($fecha == null) {
                $model->etapa = "No Definida";
            }

            $id_insert = $model->id_archivo;
            $model->id_archivo = $id_insert;
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Archivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $deleted = true;

        $temporal1 = ArticuloArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal1 as $t1) {
            $deleted = false;
        }

        $temporal2 = ColeccionDocumentalArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal2 as $t2) {
            $deleted = false;
        }

        $temporal3 = CorrespondenciaArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal3 as $t3) {
            $deleted = false;
        }

        $temporal14 = CursoOnlineArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal14 as $t14) {
            $deleted = false;
        }

        $temporal4 = ExposicionArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal4 as $t4) {
            $deleted = false;
        }

        $temporal5 = HechoArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal5 as $t5) {
            $deleted = false;
        }

        $temporal6 = HomenajeArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal6 as $t6) {
            $deleted = false;
        }

        $temporal7 = InvestigacionArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal7 as $t7) {
            $deleted = false;
        }

        $temporal8 = LineaInvestigacionArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal8 as $t8) {
            $deleted = false;
        }

        $temporal9 = NoticiaArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal9 as $t9) {
            $deleted = false;
        }

        $temporal11 = RevistaArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal11 as $t11) {
            $deleted = false;
        }


        $temporal12 = TallerArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal12 as $t12) {
            $deleted = false;
        }

        $temporal12 = TestimonioArchivo::find()->where(['id_archivo' => $this->findModel($id)->id_archivo])->all();
        foreach ($temporal12 as $t12) {
            $deleted = false;
        }

        if ($deleted == true) {


            $this->findModel($id)->delete();
            $this->afterDeleted($id);
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'No se puede eliminar un archivo que esté asociado a al menos un elemento.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Archivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Archivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Archivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionAjax_tipo_archivo_list($q = null, $id = null)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => []];

        if (!is_null($id) && $id != "") {
            $list = TipoArchivo::find()->where(['id_tipo_archivo' => $id, 'removed' => false])->andFilterWhere(['ilike', 'tipo_archivo', $q])->orderBy('tipo_archivo')->all();

            for ($i = 0; $i < count($list); $i++) {
                $out['results'][$i]['id'] = $list[$i]->id_tipo_archivo;
                $out['results'][$i]['text'] = $list[$i]->tipo_archivo;
            }
        }

        return $out;
    }



    public function afterDeleted($id)
    {
        try {
            $userId = Yii::$app->getUser()->identity->getId();
            $userIpAddress = Yii::$app->request->getUserIP();

        } catch (Exception $e) { //If we have no user object, this must be a command line program
            $userId = self::NO_USER_ID;
        }

        $log = new AuditEntry();
        $log->audit_entry_old_value = 'N/A';
        $log->audit_entry_new_value = 'N/A';
        $log->audit_entry_operation = 'Eliminar';
        $log->audit_entry_model_id = $id;
        $nombre = User::find()->where(['id' => Yii::$app->getUser()->identity->getId()])->one();
        $log->audit_entry_user_name = $nombre->username;
        $log->audit_entry_model_name = 'Archivo';
        $log->audit_entry_field_name = 'N/A';
        $log->audit_entry_timestamp = new \yii\db\Expression('unix_timestamp(NOW())');
        $log->audit_entry_user_id = $userId;
        $log->audit_entry_ip = $userIpAddress;

        $log->save(false);

    }


}
