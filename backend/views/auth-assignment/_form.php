<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Articulo\Articulo;
use backend\models\Archivo\Archivo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\User\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-archivo-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(\backend\models\User\User::find()->asArray()->all(), 'id', 'username')) ?>


    <?= $form->field($model, 'item_name')->dropDownList(
        ArrayHelper::map(\backend\models\User\AuthItem::find()->asArray()->all(), 'name', 'name') )?>







    <div class="form-group">
        <button type="submit" class="btn btn-success">Save</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
