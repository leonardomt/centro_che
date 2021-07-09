<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\User\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jerarquías';
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="auth-item-child-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Definir Jerarquía', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'parent',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\User\AuthItem::find()->asArray()->all(), 'name', 'name'),
            ],

            [
                'attribute'=>'child',
                'format' => 'raw',
                'headerOptions' => ['class' => 'col-md-5'],
                'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\User\AuthItem::find()->asArray()->all(), 'name', 'name'),
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{create}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
