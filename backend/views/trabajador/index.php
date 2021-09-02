<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Quienes\TrabajadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipo de Trabajo';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-noticia'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="trabajador-index">

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


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,

            ],
            'id'=> 'trabajador-index-update',
            'columns' => [

                [
                    'attribute' => 'nombre',                     // area
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-3'],
                ],
                [
                    'attribute' => 'cargo',                     // area
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-2'],
                ],
                [
                    'attribute' => 'correo',                     // area
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-3'],
                ],

                [
                    'attribute' => 'area',                     // area
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-md-2'],
                    'filter'=>array('Dirección' => 'Dirección', 'Coordinación Académica' => 'Coordinación Académica', 'Coordinación de Proyectos Alternativos' => 'Coordinación de Proyectos Alternativos'),
                    'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
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
