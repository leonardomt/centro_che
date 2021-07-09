<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Discurso\DiscursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discursos y Entrevistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discurso-index">

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
        'filterModel' => (new \backend\models\Discurso\DiscursoSearch()),
        'id'=> 'discurso-index-update',
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
                'headerOptions' => ['class' => 'col-md-1'],
            ],
            [
                'attribute' => 'fecha',
                'value'=> 'fecha',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3'],
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
                'attribute' => 'descripcion',
                'headerOptions' => ['class' => 'col-md-5'],
                'format' => 'raw',
            ],


            [
                'attribute' => 'lugar',                     // autor
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
            ],

            [
                'attribute' => 'medio',                     // contacto
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
            ],

            [
                'attribute' => 'entrevistador',                     // fuente
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
            ],

        

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
