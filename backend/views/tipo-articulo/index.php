<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Articulo\TipoArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Artículo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-articulo-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
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


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],

        'columns' => [


            [
                'attribute' =>  'tipo_articulo',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-11'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
