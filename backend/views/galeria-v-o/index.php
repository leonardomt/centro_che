<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
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
?>
<div class="galeria-vo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create', 'tipo' => $tipo,], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


        <?php if($tipo !=4){  echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'publico',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-4'],
                    'value' => function ($model) {
                        return $model->publico ? 'Si' : 'No';
                    },
                    'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
                ],

                [
                    'attribute' => 'id_archivo',                     // Url del Archivo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-6'],
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
                            return Html::a('<span class="fa fa-eye"></span>' , ['galeria-v-o/view', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'view']);
                        },

                        'update' => function($url, $model) use ($tipo) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>' , ['galeria-v-o/update', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'update']);
                        },

                        'delete' => function($url, $model) use ($tipo) {
                            return Html::a('<span class= "glyphicon glyphicon-trash"></span>', ['galeria-v-o/delete', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], [
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
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-4'],
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
            ],

            [
                'attribute' => 'id_archivo',                     // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-6'],
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
                        return Html::a('<span class="fa fa-eye"></span>' , ['galeria-v-o/view', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'view']);
                    },

                    'update' => function($url, $model) use ($tipo) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>' , ['galeria-v-o/update', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], ['title' => 'update']);
                    },

                    'delete' => function($url, $model) use ($tipo) {
                        return Html::a('<span class= "glyphicon glyphicon-trash"></span>', ['galeria-v-o/delete', 'id' => $model->id_galeria_vo, 'tipo' => $tipo], [
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

    <?php Pjax::end(); ?>

</div>
