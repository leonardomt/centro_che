<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Noticia\NoticiaComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Noticia Comentario';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="noticia-comentario-index ">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    </div>
    <p>
    <?= Html::a('<span><i style="color:white; margin-left: 2px; margin-top: +2px" class="fa fa-plus"></i></span></span>', ['create'], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px",
            "title"=>"Agregar"])
        ?>
    </p>

    <?php Pjax::begin([
        'id' => 'noticia-comentario-index-update',
    ]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => (new \backend\models\Articulo\ArticuloComentarioSearch()),
        'id'=> 'noticia-comentario-index-update',
        'columns' => [

            [
                'attribute' => 'revisado',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
                'filter'=>array("1"=>"Si","0"=>"No"), 'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),
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
                'attribute' => 'autor',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'fecha',
                'value'=> 'fecha',
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
                'attribute' => 'comentario',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],

            ],

            [
                'attribute'=>'id_noticia',
                'value'=>'noticia.titulo_noticia',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Noticia\Noticia::find()->asArray()->all(), 'id_noticia', 'titulo_noticia'),
            ],




            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
