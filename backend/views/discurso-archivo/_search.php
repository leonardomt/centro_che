<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\DiscursoArchivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discurso-archivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_discurso_archivo') ?>

    <?= $form->field($model, 'id_discurso') ?>

    <?= $form->field($model, 'id_archivo') ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'portada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
