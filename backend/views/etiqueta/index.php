<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Etiqueta\EtiquetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Etiquetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiquetas-index col-md-12">

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
        'filterModel' => $searchModel,
        'columns' => [

            'etiqueta:ntext',

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{delete}','header'=>false,
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'delete' => function ($url, $model)
                    {
                        return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],

        ],
    ]); ?>



</div>