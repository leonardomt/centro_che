<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Archivo\TipoArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-archivo-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Create Tipo Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_tipo_archivo',
            'tipo_archivo:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
