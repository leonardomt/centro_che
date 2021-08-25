<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Comentario\Comentario */

$this->title = $model->alias;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comentario-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>

        <?php if ($model->publico == 0): ?>
            <?= Html::a('<span class="fa fa-check"></span>', ['aprobar', 'id' => $model->id], [
                    'class' => 'btn btn-primary',
                    'style'=>"width: 40px ; height: 40px",
                    'title'=>"Aprobar",
                    'data' => [
                        'confirm' => 'Está seguro de que desea publicar este comentario?',
                        'method' => 'post',
                    ],
                ]
            ) ?>
        <?php endif; ?>
        <?php if ($model->publico == 0 && $model->revisado == 0): ?>
            <?= Html::a('<span class="fa fa-times"></span>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'style'=>"width: 40px ; height: 40px",
                'title'=>"Denegar",
                'data' => [
                    'confirm' => 'Está seguro de que desea denegar este comentario?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
        <?= Html::a('<span class="fa fa-pencil"></span>', ['create', 'id' => $model->id ], [
            'class' => 'btn btn-warning',
            'style'=>"width: 40px ; height: 40px",
            'title'=>"Responder",
            'data' => [
                'confirm' => 'Está seguro de que desea responder como institución este comentario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fecha',
            'alias',
            'correo',
            'comentario:ntext',
            'tabla',
            'seccion',
            [
                'attribute' => 'Publico',
                'value' => function ($model) {
                    return $model->revisado ? 'Sí' : 'No';
                },
            ],
        ],
    ]) ?>

</div>
