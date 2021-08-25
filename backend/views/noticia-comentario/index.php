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
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

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
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'], [
            'class' => 'btn btn-success',
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
                    return $model->revisado ? 'Sí' : 'No';
                },
                'filter'=>array("1"=>"Sí","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),],
            [
                'attribute' => 'publico',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    return $model->publico ? 'Sí' : 'No';
                },
                'filter'=>array("1"=>"Sí","0"=>"No"),
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),    ],

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
                        'format'=>'yyyy-mm-dd', 'endDate' => date('Y-m-d')
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
                'filterInputOptions' => array('class' => 'form-control', 'id' => null, 'prompt' => 'Todos'),    ],




            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
