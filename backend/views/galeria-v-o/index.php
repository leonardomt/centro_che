<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Galeria\GaleriaVoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if($tipo == 1){
    $this->title = 'Galería de Fotografías';
}
if($tipo == 2){
    $this->title = 'Galería de Audios';
}
if($tipo == 3){
    $this->title = 'Galería de Videos';
}
if($tipo == 4){
    $this->title = 'Galería de Homenajes';
}


$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-vida-obra'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="galeria-vo-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span ><i style="color:white; " class="fa fa-plus"></i></span>', ['create', 'tipo' => $tipo], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px; font-size: 1.1em",
            'title'=>"Agregar",
        ]) ?>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



        <?php if($tipo !=4){  echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,

            ],
            'columns' => [



                [
                    'attribute' => 'id_archivo',                     // Url del Archivo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-10'],
                    'value' => function ($model) {
                        if($model->id_archivo != ' ' && $model->id_archivo != NULL) { // verifica si fue importada o no
                            if ($model->tipo_archivo == 1) {
                                return Html::img('../../frontend/web/' . $model->id_archivo,
                                    ['alt' => $model->id_archivo, 'height' => 300]);
                            } else if ($model->tipo_archivo == 3) {
                                return '<video  controls autoplay style="height: 300px">
                    <source src="../../frontend/web/' . $model->id_archivo . '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>';
                            } else if ($model->tipo_archivo == 2) {
                                return '<audio  controls style="width: 450px ">
                    <source src="../../frontend/web/' . $model->id_archivo . '" >
                    Your browser does not support the video tag.
                    </audio>';
                            } else {
                                return Html::label('_');
                                // si no tiene asignada una portada, solo muestra un guion bajo
                            }
                        }

                    },
                ],



                [
                    'class' =>'kartik\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons'=> [
                        'view' => function($url, $model) use ($tipo) {
                            return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>' , ['galeria-v-o/view', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'view']);
                        },

                        'update' => function($url, $model) use ($tipo) {
                            return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>' , ['galeria-v-o/update', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'update']);
                        },

                        'delete' => function($url, $model) use ($tipo) {
                            return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>', ['galeria-v-o/delete', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], [
                                'data' => [
                                    'confirm' => 'Está seguro de que desea eliminar este elemento?',
                                    'method' => 'post',
                                ],
                                'title' => "Eliminar"

                            ]);
                        } ,
                    ],


                ],
            ],
        ]); } ?>

    <?php if($tipo ==4){  echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            [
                'attribute' => 'id_archivo',                     // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-10'],
                'value' => function ($model) {
                    if($model->id_archivo != ' ' && $model->id_archivo != NULL) { // verifica si fue importada o no
                        if ($model->tipo_archivo == 1) {
                            return Html::img('../../frontend/web/' . $model->id_archivo,
                                ['alt' => $model->id_archivo, 'height' => 300]);
                        } else if ($model->tipo_archivo == 3) {
                            return '<video  controls autoplay style="height: 300px">
                    <source src="../../frontend/web/' . $model->id_archivo . '" type="video/mp4">
                    Your browser does not support the video tag.
                </video>';
                        } else if ($model->tipo_archivo == 2) {
                            return '<audio  controls style="width: 450px ">
                    <source src="../../frontend/web/' . $model->id_archivo . '" >
                    Your browser does not support the video tag.
                    </audio>';
                        } else {
                            return Html::label('_');
                            // si no tiene asignada una portada, solo muestra un guion bajo
                        }
                    }

                },
            ],

            [
                'class' =>'kartik\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons'=> [
                    'view' => function($url, $model) use ($tipo) {
                        return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>' , ['galeria-v-o/view', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'view']);
                    },

                    'update' => function($url, $model) use ($tipo) {
                        return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>' , ['galeria-v-o/update', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'update']);
                    },

                    'delete' => function($url, $model) use ($tipo) {
                        return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>', ['galeria-v-o/delete', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], [
                            'data' => [
                                'confirm' => 'Está seguro de que desea eliminar este elemento?',
                                'method' => 'post',
                            ],
                            'title' => "Eliminar"

                        ]);
                    } ,
                ],


            ],
        ],
    ]); } ?>



</div>
