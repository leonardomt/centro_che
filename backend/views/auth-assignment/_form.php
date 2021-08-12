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


    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        ArrayHelper::map(\backend\models\User\AuthItem::find()->where(['type'=>1])->asArray()->all(), 'name', 'name') )?>



    <div class="row">
        <div class="col-md-11"></div>
        <div class="form-group">
            <?= Html::submitButton('  <i class="fa fa-floppy-o" aria-hidden="true"></i>', ['class' => 'btn btn-success ']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
