<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Articulo\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Artículos';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-coordinacion'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

    ?>

<div class="articulo-index  col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    </div>
    <p>
        <?= Html::a('<span ><i style="color:white; " class="fa fa-plus"></i></span>', ['create'], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px; font-size: 1.1em",
            'title'=>"Agregar",
        ]) ?>
    </p>
    <div class="col-md-12">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'id' => 'articulo-index-update',
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,

            ],

            'columns' => [
                [
                    'attribute' => 'revisado',                     // Revisado
                    'format' => 'raw',

                    'value' => function ($model) {
                        if ($model->revisado != '0') {
                            return 'Sí';
                        } else {
                            return 'No';
                        }
                    },
                    'headerOptions' => ['class' => 'col-md-1'],

                    'filter' => array( "1" => "Sí", "0" => "No"),
                    'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),

                ],
                [
                    'attribute' => 'publico',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'value' => function ($model) {
                        return $model->publico ? 'Sí' : 'No';
                    },
                    'filter' => array("1" => "Sí", "0" => "No"),
                    'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
                ],
                [
                    'attribute' => 'titulo',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-2'],

                ],
                [
                    'attribute' => 'autor',                     // Titulo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-2'],
                ],
                [
                    'attribute' => 'id_investigacion',
                    'value' => 'investigacionInscrita.titulo_investigacion',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'format' => 'raw',
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Investigacion\Investigacion::find()->asArray()->all(), 'id_investigacion', 'titulo_investigacion'),
                    'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
                ],
                [
                    'attribute' => 'palabras_clave',                     // Titulo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                ],
                [
                    'attribute' => 'fecha',
                    'value'=> function ($model) {
                        if ($model->tipo_fecha ==0){  return $model->fecha;};
                        if ($model->tipo_fecha ==1){  return $model->fecha;};
                        if ($model->tipo_fecha ==2){  return date('Y',strtotime($model->fecha));};
                        if ($model->tipo_fecha ==3){  return date('Y-m',strtotime($model->fecha));};
                        if ($model->tipo_fecha ==4){  return date('Y-m',strtotime($model->fecha));};

                    },
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                ],
                [
                    'attribute' => 'fecha_fin',
                    'value'=> function ($model) {
                        if ($model->tipo_fecha ==0){  return null;};
                        if ($model->tipo_fecha ==1){  return $model->fecha_fin;};
                        if ($model->tipo_fecha ==2){  return null;};
                        if ($model->tipo_fecha ==3){  return null;};
                        if ($model->tipo_fecha ==4){  return date('Y-m',strtotime($model->fecha_fin));};

                    },
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{view}{update}{delete}','header'=>false,
                    'headerOptions' => ['class' => 'col-md-2'],
                    'buttons' => [
                        'view' => function ($url, $model)
                        {
                            return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>',$url);
                        },
                        'update' => function ($url, $model)
                        {
                            return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>',$url);
                        },
                        'delete' => function ($url, $model)
                        {
                            return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>


</div>


<?php

