<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Escrito\EscritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escrito-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <p>
        <?= Html::a('<span><i style="color:white; margin-left: 2px; margin-top: +2px" class="fa fa-plus"></i></span></span>', ['create'], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px",
            "title"=>"Agregar"])
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'id'=> 'escrito-index-update',
        'columns' => [

            [
                'attribute' => 'revisado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->revisado ? 'Sí' : 'No';
                },
                'filter'=>array("1"=>"Sí","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->publico ? 'Sí' : 'No';
                },
                'filter'=>array("1"=>"Sí","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'tipo',                     // tipo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter' => array('Crónica'=>'Crónica','Poesía'=>'Poesía', 'Artículo'=>'Artículo', 'Apuntes de Lectura'=>'Apuntes de Lectura', 'Prólogo'=>'Prólogo', 'Ensayo'=>'Ensayo'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
            ],
            [
                'attribute' => 'autor',                     // autor
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => array('Ernesto Guevara de la Serna' => 'Ernesto Guevara de la Serna', 'Ernesto Che Guevara' => 'Ernesto Che Guevara'),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
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
                'attribute' => 'titulo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
            ],
            [
                'attribute' => 'descripcion',
                'headerOptions' => ['class' => 'col-md-2'],
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div style="line-height: 1.2em; height: 6em; overflow: hidden;">'.\yii\helpers\HtmlPurifier::process($model->descripcion).'</div>';
                },
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
