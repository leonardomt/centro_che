<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Homenaje\HomenajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homenajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homenaje-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'titulo:ntext',
            'descripcion:ntext',
            'id_tipo_homenaje',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => ['view' => function ($url) {return Html::a('<span>Ver</span>', $url, ['title' => 'view', 'data-pjax' => '0',]);},],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
