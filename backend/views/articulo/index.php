<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use kartik\grid\GridView;


/* @var $this yii\web\View */

/* @var $searchModel backend\models\Articulo\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Artículos';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
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
        <?= Html::a('<span class="fa fa-plus "></span>', ['create'], [
            'class' => 'btn btn-success',
            "title" => "Agregar"])
        ?>
    </p>
    <div class="col-md-12">
        <?php Pjax::begin([
            'id' => 'articulo-index-update',
        ]); ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => (new \backend\models\Articulo\ArticuloSearch()),
            'id' => 'articulo-index-update',

            'columns' => [
                [
                    'attribute' => 'revisado',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'value' => function ($model) {
                        return $model->revisado ? 'Si' : 'No';
                    },
                    'filter' => array("" => "Todos", "1" => "Si", "0" => "No"),
                ],
                [
                    'attribute' => 'publico',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'value' => function ($model) {
                        return $model->publico ? 'Si' : 'No';
                    },
                    'filter' => array("" => "Todos", "1" => "Si", "0" => "No"),
                ],
                [
                    'attribute' => 'titulo',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],

                ],
                [
                    'attribute' => 'autor',                     // Titulo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                ],
                [
                    'attribute' => 'id_investigacion',
                    'value' => 'investigacionInscrita.titulo_investigacion',
                    'format' => 'raw',
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Investigacion\Investigacion::find()->asArray()->all(), 'id_investigacion', 'titulo_investigacion'),
                ],
                [
                    'attribute' => 'palabras_clave',                     // Titulo
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                ],
                [
                    'attribute' => 'fecha',
                    'value' => 'fecha',
                    'format' => 'raw',
                    'filter' => \dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'fecha',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ],
                    ]),

                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'buttons' => [
                        'view' => function ($url, $model)
                        {
                            return Html::a('<button class="btn btn-success"><i class="fa fa-eye"></i></button>',$url);
                        },
                        'update' => function ($url, $model)
                        {
                            return Html::a('<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>',$url);
                        },
                        'delete' => function ($url, $model)
                        {
                            return Html::a('<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>


<?php


$this->registerJs(

    '$("document").ready(function(){ 

        $("#search-form").on("pjax:end", function() {

            $.pjax.reload({container:"#articulo-index-update"});  //Reload GridView

        });

    });'

);

?>
