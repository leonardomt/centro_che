<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeria\GaleriaVoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeria-vo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_galeria_vo') ?>

    <?= $form->field($model, 'id_archivo') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'genero') ?>

    <?= $form->field($model, 'nota') ?>

    <?php // echo $form->field($model, 'publico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
