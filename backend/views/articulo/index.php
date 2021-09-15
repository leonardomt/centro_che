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
    return Yii::$app->getResponse()->redirect(Url::to(['site/login']));
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
        <?= Html::a('<span><i style="color:white; margin-left: 2px; margin-top: 5px;" class="fa fa-plus"></i></span></span>', ['create'], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px",
            "title" => "Agregar"])
        ?>
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
                    'headerOptions' => ['class' => 'col-md-2'],
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
                    'value' => 'fecha',
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-1'],
                    'filter' => \dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'fecha','language' => 'es',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd', 'endDate' => date('Y-m-d')
                        ],
                    ]),

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

