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
        <?= Html::a('<span><i style="color:white; margin-left: 2px; margin-top: +2px" class="fa fa-plus"></i></span></span>', ['create'], [
            'class' => 'btn btn-success',
            'style'=>"width: 40px ; height: 40px",
            "title" => "Agregar"
        ])
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'user-index-update',
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,

        ],
        'columns' => [


            [
                'attribute' => 'first_name',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'last_name',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-1']
            ],
            [
                'attribute' => 'username',                     // Titulo
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-2']
            ],

            [
                'attribute' => 'type',
                'headerOptions' => ['class' => 'col-md-1'],
                'value' => function ($model) {
                    $rol = \backend\models\User\AuthAssignment::find()->where(['user_id' => $model->id])->one();
                    if ($rol != null) {
                        return $rol->item_name;
                    } else return "";
                },
                'format' => 'raw',

            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete}','header'=>false,
                'headerOptions' => ['class' => 'col-md-2'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button title="Ver" class="btn btn-secondary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-eye"></i></button>', $url);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<button title="Modificar" class="btn btn-primary" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-pencil"></i></button>', $url);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<button title="Eliminar" class="btn btn-danger" style="width: 40px ; margin-top: 2px;  margin-left: 2px"><i class="fa fa-trash"></i></button>', $url, ['data-confirm' => '¿Está seguro que desea eliminar este elemento?', 'data-method' => 'POST']);
                    }
                ],
            ],
        ],
    ]); ?>



</div>
