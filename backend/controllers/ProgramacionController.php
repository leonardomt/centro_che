<?php

namespace backend\controllers;

use backend\models\Archivo\Archivo;
use Yii;
use backend\models\Programacion\Programacion;
use backend\models\Programacion\ProgramacionArchivo;
use backend\models\Programacion\ProgramacionSearch;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\base\Model;

/**
 * ProgramacionController implements the CRUD actions for Programacion model.
 */
class ProgramacionController extends Controller
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
     * Lists all Programacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programacion model.
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
     * Creates a new Programacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Programacion;
        $modelsArchivo = [new ProgramacionArchivo];
        $x = 0;
        if ($model->load(Yii::$app->request->post())) {

            $tipoFecha = $model->tipo_fecha;
            //--------------Fecha Exacta-----------------------------------------------
            if ($tipoFecha == 0) {
                if (($model->year == null || $model->month == null || $model->day == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . $model->month . '-' . $model->day;
                $model->fecha_fin = null;

                if ($model->fecha > date('Y-m-d')) {
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al d??a de hoy');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }

            }
            //--------------Rango de Fecha-----------------------------
            if ($tipoFecha == 1) {
                if (($model->year == null || $model->month == null || $model->day == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }

                if (($model->year_end == null || $model->month_end == null || $model->day_end == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha final debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }

                $model->fecha = $model->year . '-' . $model->month . '-' . $model->day;
                $model->fecha_fin = $model->year_end . '-' . $model->month_end . '-' . $model->day_end;
                if ($model->fecha > $model->fecha_fin) {
                    Yii::$app->session->setFlash('error', 'La fecha de inicio no puede ser posterior a la fecha final');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            }
            //------------------------------A??o------------------------
            if ($tipoFecha == 2) {
                if ($model->year == null ) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . '01' . '-' . '01';
                $model->fecha_fin = null;
            }

            //------------------------------A??o y mes------------------------
            if ($tipoFecha == 3) {
                if ($model->year == null || $model->month == null) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . $model->month . '-' . '01';
                $model->fecha_fin = null;
            }

            //------------------------------Rango de meses------------------------
            if ($tipoFecha == 4) {
                if ($model->year == null || $model->month == null) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }

                if ($model->year_end == null || $model->month_end == null) {
                    Yii::$app->session->setFlash('error', 'La fecha final debe estar completa');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }

                $model->fecha = $model->year . '-' . $model->month . '-' . '01';
                $model->fecha_fin = $model->year_end . '-' . $model->month_end . '-' . '01';
                if ($model->fecha > $model->fecha_fin) {
                    Yii::$app->session->setFlash('error', 'La fecha de inicio no puede ser posterior a la fecha final');
                    return $this->redirect([
                        'create',
                        'model' => $model,
                    ]);
                }
            }
            //---------------------------------Fin de las validaciones de fechas---------------------


            $modelsArchivo = Model::createMultiple(ProgramacionArchivo::classname());
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsArchivo),
                    ActiveForm::validate($model)
                );
            }
// validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsArchivo as $modelArchivo) {
                            if ($x == 0) {
                                $modelArchivo->portada = 1;
                                $x++;
                                $archivo = Archivo::find()->where(['id_archivo' => $modelArchivo->id_archivo])->one();
                                if (!($archivo->tipo_archivo == 1)) {
                                    Yii::$app->session->setFlash('error', 'La programaci??n solo puede tener una imagen como portada.');
                                    return $this->redirect([
                                        'create', 'model' => $model,
                                        'modelsArchivo' => (empty($modelsArchivo)) ? [new ProgramacionArchivo] : $modelsArchivo,
                                    ]);
                                };
                            } else {
                                $modelArchivo->portada = 0;
                            }
                            $modelArchivo->id_programacion = $model->id;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                            else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Proyectos Alternativos / Programaci??n Cultural / Crear Programaci??n Cultural - Archivo Asociado', $model->id, $model->titulo, 'Insertar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterInsert($model, 'Proyectos Alternativos / Programaci??n Cultural / Crear Programaci??n Cultural', $model->id, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,

            'modelsArchivo' => (empty($modelsArchivo)) ? [new ProgramacionArchivo] : $modelsArchivo,
        ]);
    }

    /**
     * Updates an existing Programacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldmodel = $this->findModel($id);
        $modelsArchivo = ProgramacionArchivo::find()->where(['id_programacion' => $model->id])->all();
        $x = 0;

        if($model->fecha != null){
            $model->year = date('Y', strtotime($model->fecha));
            $model->month = date('m', strtotime($model->fecha));
            $model->day = date('d', strtotime($model->fecha));
        }
        if($model->fecha_fin != null){
            $model->year_end = date('Y', strtotime($model->fecha_fin));
            $model->month_end = date('m', strtotime($model->fecha_fin));
            $model->day_end = date('d', strtotime($model->fecha_fin));
        }

        if ($model->load(Yii::$app->request->post())) {
            $tipoFecha = $model->tipo_fecha;
            //--------------Fecha Exacta-----------------------------------------------
            if ($tipoFecha == 0) {
                if (($model->year == null || $model->month == null || $model->day == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . $model->month . '-' . $model->day;
                $model->fecha_fin = null;
                if ($model->fecha > date('Y-m-d')) {
                    Yii::$app->session->setFlash('error', 'La fecha no puede ser posterior al d??a de hoy');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
            }
            //--------------Rango de Fecha-----------------------------
            if ($tipoFecha == 1) {
                if (($model->year == null || $model->month == null || $model->day == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }

                if (($model->year_end == null || $model->month_end == null || $model->day_end == null)) {
                    Yii::$app->session->setFlash('error', 'La fecha final debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }

                $model->fecha = $model->year . '-' . $model->month . '-' . $model->day;
                $model->fecha_fin = $model->year_end . '-' . $model->month_end . '-' . $model->day_end;
                if ($model->fecha > $model->fecha_fin) {
                    Yii::$app->session->setFlash('error', 'La fecha de inicio no puede ser posterior a la fecha final');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
            }
            //------------------------------A??o------------------------
            if ($tipoFecha == 2) {
                if ($model->year == null ) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . '01' . '-' . '01';
                $model->fecha_fin = null;
            }

            //------------------------------A??o y mes------------------------
            if ($tipoFecha == 3) {
                if ($model->year == null || $model->month == null) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
                $model->fecha = $model->year . '-' . $model->month . '-' . '01';
                $model->fecha_fin = null;
            }

            //------------------------------Rango de meses------------------------
            if ($tipoFecha == 4) {
                if ($model->year == null || $model->month == null) {
                    Yii::$app->session->setFlash('error', 'La fecha debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }

                if ($model->year_end == null || $model->month_end == null) {
                    Yii::$app->session->setFlash('error', 'La fecha final debe estar completa');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }

                $model->fecha = $model->year . '-' . $model->month . '-' . '01';
                $model->fecha_fin = $model->year_end . '-' . $model->month_end . '-' . '01';
                if ($model->fecha > $model->fecha_fin) {
                    Yii::$app->session->setFlash('error', 'La fecha de inicio no puede ser posterior a la fecha final');
                    return $this->redirect([
                        'update', 'id'=> $id,
                        'model' => $model,
                    ]);
                }
            }
            //---------------------------------Fin de las validaciones de fechas---------------------



            $oldIDs = ArrayHelper::map($modelsArchivo, 'id', '');
            $modelsArchivo = Model::createMultiple(ProgramacionArchivo::classname(), $modelsArchivo);
            Model::loadMultiple($modelsArchivo, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsArchivo, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsArchivo) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            ProgramacionArchivo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsArchivo as $modelArchivo) {
                            $modelArchivo->id_programacion = $model->id;
                            if (!($flag = $modelArchivo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                            else
                                AuditEntryController::afterInsertOrUpdateFile($modelArchivo, 'Proyectos Alternativos / Programaci??n Cultural / Modificar Programaci??n Cultural - Archivo Asociado', $model->id, $model->titulo, 'Modificar');
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        AuditEntryController::afterUpdate( $oldmodel, $model, 'Proyectos Alternativos / Programaci??n Cultural / Modificar Programaci??n Cultural', $model->id, $model->titulo);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsArchivo' => (empty($modelsArchivo)) ? [new ProgramacionArchivo] : $modelsArchivo,
            'tipo'=>$oldmodel->tipo_fecha,
        ]);
    }

    /**
     * Deletes an existing Programacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        AuditEntryController::afterDelete(  $this->findModel($id), 'Proyectos Alternativos / Programaci??n Cultural / Eliminar Programaci??n Cultural', $this->findModel($id)->id, $this->findModel($id)->titulo);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Programacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Programacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
