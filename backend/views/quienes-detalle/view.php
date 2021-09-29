<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\Alert;
use kartik\grid\GridView;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\QuienesDetalle */

$this->title = "Quienes Somos - Detalles";
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-inicio'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="quienes-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>
                <?= Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title' => "Modificar", 'style' => "width: 40px; height: 40px",]) ?>
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <?= Html::a('<span class="fa fa-user-plus "></span>', ['/trabajador/create'], [
                    'class' => 'btn btn-success',
                    'style' => "width: 40px; height: 40px",
                    "title"=>"Agregar Trabajador"])
                ?>
            </p>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'descripcion:ntext',
                ],
            ]) ?>

            <?php
            $searchModel = new backend\models\Quienes\QuienesDetalleArchivoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            ?>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'id' => 'archivo-index-update',
                'layout' => '{items}{pager}',
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout' => true,

                ],

                'columns' => [

                    [
                        'attribute' => 'url',                     // Url del Archivo
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'col-md-10'],
                        'enableSorting' => false,
                        'value' => function ($model) {
                            if ($model->url != ' ' && $model->url != NULL) { // verifica si fue importada o no

                                return '<div style="width:400px; height:200px; object-fit: contain;"><img style="height:100%; width: 100%; object-fit: contain" src="../../frontend/web/'.$model->url.'"
                                 alt="" ></div>';
                            } else {
                                return Html::label('_');
                                // si no tiene asignada una portada, solo muestra un guion bajo
                            }
                        }

                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{delete}','header'=>false,
                        'headerOptions' => ['class' => 'col-md-1'],
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a('<button title="Eliminar" style="width: 40px; height: 40px", class="btn btn-danger"><i class="fa fa-trash"></i></button>', ['quienes-detalle-archivo/delete', 'id' => $model->id], ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' => 'POST']);
                            }
                        ],
                    ],


                ],
            ]); ?>


        </div>
        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => $dataProviderT,
                'filterModel' => $searchModelT,
                'layout' => '{items}{pager}',
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout' => true,

                ],
                'id' => 'trabajador-index-update',
                'columns' => [

                    [
                        'attribute' => 'nombre',                     // area
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'col-md-1'],
                    ],
                    [
                        'attribute' => 'cargo',                     // area
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'col-md-1'],
                    ],

                    [
                        'attribute' => 'area',                     // area
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'col-md-1'],
                        'filter' => array('Dirección' => 'Dirección', 'Coordinación Académica' => 'Coordinación Académica', 'Coordinación de Proyectos Alternativos' => 'Coordinación de Proyectos Alternativos'),
                        'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{view}{update}{delete}','header'=>false,
                        'headerOptions' => ['class' => 'col-md-3'],
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', ['trabajador/view', 'id' => $model->id]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>', ['trabajador/update', 'id' => $model->id]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>', ['trabajador/delete', 'id' => $model->id], ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' => 'POST']);
                            }
                        ],
                    ],
                ],
            ]); ?>


        </div>
    </div>


</div>
