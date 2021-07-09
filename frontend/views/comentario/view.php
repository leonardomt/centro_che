<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model frontend\models\Articulo\ArticuloComentario */

$this->title = $model->autor;
$this->params['breadcrumbs'][] = ['label' => 'Artículo-Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="articulo-comentario-view col-md-12">





    <div class="container">

    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'revisado',
                'value' => function ($model) {
                    return $model->revisado ? 'Si' : 'No';
                },
            ],
            [
                'attribute' => 'publico',
                'value' => function ($model) {
                    return $model->publico ? 'Si' : 'No';
                },
            ],

            'autor',
            'comentario:ntext',
            'fecha',


        ],
    ]) ?>


</div>
