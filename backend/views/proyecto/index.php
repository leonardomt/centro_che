<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Proyecto\ProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'id'=> 'proyecto-index-update',
        'columns' => [

            'descripcion:ntext',
            'enlace:ntext',
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}','header'=>false,
                'headerOptions' => ['class' => 'col-md-1'],
                'buttons' => [
                    'view' => function ($url, $model)
                    {
                        return Html::a('<button title="Ver" class="btn btn-success" style="width: 40px ; margin-top: 2px ;  margin-left: 2px"><i class="fa fa-eye"></i></button>',$url);
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
