<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Taller\TallerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos Comunitarios';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-taller'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="taller-index col-md-12">


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

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id'=> 'taller-index-update',
        'columns' => [

            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
                'filter'=>array("1"=>"Si","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'revisado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
                'filter'=>array("1"=>"Si","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'nombre',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'encargado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'contacto',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'descripcion',
                'headerOptions' => ['class' => 'col-md-3'],
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div style="line-height: 1.2em; height: 6em; overflow: hidden;">'.\yii\helpers\HtmlPurifier::process($model->descripcion).'</div>';
                },

            ],
            [
                'attribute'=>'tipo',
                'value'=>'tipoTaller.tipo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Taller\TipoTaller::find()->asArray()->all(), 'id', 'tipo'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'headerOptions' => ['class' => 'col-md-1'],
                'buttons' => [
                    'view' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-success" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>',$url);
                    },
                    'update' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>',$url);
                    },
                    'delete' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
