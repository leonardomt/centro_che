<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuditEntrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'audit_entry_id') ?>

    <?= $form->field($model, 'audit_entry_timestamp') ?>

    <?= $form->field($model, 'audit_entry_model_name') ?>

    <?= $form->field($model, 'audit_entry_operation') ?>

    <?= $form->field($model, 'audit_entry_field_name') ?>

    <?php // echo $form->field($model, 'audit_entry_old_value') ?>

    <?php // echo $form->field($model, 'audit_entry_new_value') ?>

    <?php // echo $form->field($model, 'audit_entry_user_id') ?>

    <?php // echo $form->field($model, 'audit_entry_ip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
