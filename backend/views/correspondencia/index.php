<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Correspondencia\CorrespondenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Correspondencias';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-correspondencia'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="correspondencia-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
            'class' => 'btn btn-success',
            "title"=>"Agregar"])
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => (new \backend\models\Correspondencia\CorrespondenciaSearch()),
        'id'=> 'correspondencia-index-update',

        'columns' => [

            [
                'attribute' => 'revisado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
            ],
            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
                'filter'=>array(""=>"Todos","1"=>"Si","0"=>"No"),
            ],
            [
                'attribute' => 'titulo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'descripcion',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5']
            ],
            [
                'attribute' => 'destinatario',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'remitente',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'fecha',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'filter'=>\dosamigos\datepicker\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'fecha',
                    'clientOptions'=>[
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd'
                    ],
                ]),


            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
