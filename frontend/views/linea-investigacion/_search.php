<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LineaInvestigacion\LineaInvestigacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linea-investigacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_linea_investigacion') ?>

    <?= $form->field($model, 'revisado') ?>

    <?= $form->field($model, 'publico') ?>

    <?= $form->field($model, 'nombre_linea') ?>

    <?= $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
