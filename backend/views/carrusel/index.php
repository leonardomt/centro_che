<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Carrusel\CarruselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carrusel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrusel-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span class="fa fa-plus "></span>', ['create'], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'archivo-index-update',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'toolbar' => [
            'options' => ['class' => 'pull-left'],
            [
                'content' =>
                Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
                    'data-pjax' => 0,
                    'class' => 'btn btn-success',
                    "title" => "Agregar"
                ]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', 'index.php?r=archivo%2Findex', ['class' => 'btn btn-default', 'title' => 'Reiniciar']),
            ],
            '{toggleData}',
            '{export}',
        ],
        'columns' => [


            [
                'attribute' => 'url',                     // Url del Archivo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-11'],
                'value' => function ($model) {
                    if ($model->url != ' ' && $model->url != NULL) { // verifica si fue importada o no

                        return Html::img(
                            '../../frontend/web/' . $model->url,
                            ['alt' => $model->url, 'height' => 250]
                        );
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
                    'delete' => function ($url, $model)
                    {
                        return Html::a('<button title="Eliminar" class="btn btn-danger"><i class="fa fa-trash"></i></button>',['delete', 'id' => $model->id], ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],

        ],
    ]); ?>



</div>