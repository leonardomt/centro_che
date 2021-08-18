<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Otros\OtrosArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Otros Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otros-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Otros Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'id',
            'id_otros',
            'id_archivo',
            'portada',
            'nota:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
