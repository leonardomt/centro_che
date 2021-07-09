<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\ClaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'profesor') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'enlace') ?>

    <?php // echo $form->field($model, 'revisado') ?>

    <?php // echo $form->field($model, 'publico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
