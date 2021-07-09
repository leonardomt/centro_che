<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Discurso\DiscursoArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discurso Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discurso-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Discurso Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_discurso_archivo',
            'id_discurso',
            'id_archivo',
            'cuerpo:ntext',
            'portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
