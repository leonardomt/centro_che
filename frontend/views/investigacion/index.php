<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Investigacion\InvestigacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Investigaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investigacion-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'titulo_investigacion:ntext',
            'descripcion:ntext',
            'autor:ntext',
            'id_linea_investigacion',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => ['view' => function ($url) {return Html::a('<span>Ver</span>', $url, ['title' => 'view', 'data-pjax' => '0',]);},],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
