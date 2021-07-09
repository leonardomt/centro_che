<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\DiscursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discurso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_discurso') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'lugar') ?>

    <?php // echo $form->field($model, 'medio') ?>

    <?php // echo $form->field($model, 'entrevistador') ?>

    <?php // echo $form->field($model, 'cuerpo') ?>

    <?php // echo $form->field($model, 'revisado') ?>

    <?php // echo $form->field($model, 'publico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
