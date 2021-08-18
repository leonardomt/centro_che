<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\User\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignación de Roles';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="auth-assignment-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Asignar Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute'=>'item_name',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\User\AuthItem::find()->asArray()->all(), 'name', 'name'),
            ],

            [
                'attribute'=>'user_id',
                'value'=>'user.username',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\User\User::find()->asArray()->all(), 'id', 'username'),
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{create}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
