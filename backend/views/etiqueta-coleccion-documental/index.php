<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\Etiqueta\EtiquetaColeccionDocumentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Etiqueta Coleccion Documentals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiqueta-coleccion-documental-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Etiqueta Coleccion Documental', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_etiqueta',
            'id_coleccion_documental',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
