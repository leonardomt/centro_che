<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Proyecto\ProyectoArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyecto Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proyecto Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_proyecto_archivo',
            'id_archivo',
            'id_proyecto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
