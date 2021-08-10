<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\User\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index col-md-12">


    <div class="">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('<span class="fa fa-plus "></span>', ['create'], [
            'class' => 'btn btn-success',
            "title" => "Agregar"
        ])
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => (new \backend\models\User\UserSearch()),
        'id'=> 'user-index-update',
        'columns' => [


            [
                'attribute' => 'first_name',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],
            [
                'attribute' => 'last_name',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],
            [
                'attribute' => 'username',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-3']
            ],

            [
                'attribute' => 'status',
                'value'=> 'statusText',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],

            [
                'attribute' => 'rol',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    $rol = \backend\models\User\AuthAssignment::find()->where(['user_id' => $model->id])->one();
                    if($rol != null){
                        return $rol->item_name;
                    }else return "";
                },
                'format' => 'raw',
                'filter' => false,
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'headerOptions' => ['class' => 'col-md-1'],
                'buttons' => [
                    'view' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-success" style="width: 40px ; margin-top: 2px"><i class="fa fa-eye"></i></button>',$url);
                    },
                    'update' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-primary" style="width: 40px ; margin-top: 2px"><i class="fa fa-pencil"></i></button>',$url);
                    },
                    'delete' => function ($url, $model)
                    {
                        return Html::a('<button class="btn btn-danger" style="width: 40px ; margin-top: 2px"><i class="fa fa-trash"></i></button>',$url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' =>'POST']);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
