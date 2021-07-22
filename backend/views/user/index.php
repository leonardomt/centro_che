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



            ['class' => 'kartik\grid\ActionColumn',
                'template' => '{view}{update}{delete} ',
                'headerOptions' => ['class' => 'col-md-1'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
