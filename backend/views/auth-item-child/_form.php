<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Articulo\Articulo;
use backend\models\Archivo\Archivo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\User\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-archivo-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'parent')->dropDownList(
        ArrayHelper::map(\backend\models\User\AuthItem::find()->where(['type'=>1])->asArray()->all(), 'name', 'name')) ?>


    <?= $form->field($model, 'child')->dropDownList(
        ArrayHelper::map(\backend\models\User\AuthItem::find()->where(['type'=>2])->asArray()->all(), 'name', 'name') )?>



    <div class="form-group">
        <button type="submit" class="btn btn-success">Save</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
