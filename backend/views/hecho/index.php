<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Hecho\HechoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hechos';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-hecho'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="hecho-index col-md-12">

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
        'filterModel' => (new \backend\models\Hecho\HechoSearch()),
        'id'=> 'hecho-index-update',
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
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'fecha',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter'=>\dosamigos\datepicker\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'fecha',
                    'clientOptions'=>[
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd'
                    ],
                ]),
            ],
            [
                'attribute' => 'etapa',                     // etapa
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter' => array("Infancia" => "Infancia", "Adolescencia" => "Adolescencia", "Adulto Joven" => "Adulto Joven", "Adulto" => "Adulto", "Posterior a 1967" => "Posterior a 1967", "No definida" => "No definida"),
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
                'attribute' => 'cuerpo',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
