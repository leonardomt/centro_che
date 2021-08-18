<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Escrito\EscritoArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escrito Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escrito-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Escrito Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_escrito_archivo',
            'id_escrito',
            'id_archivo',
            'nota:ntext',
            'portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
