<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Archivo\Archivo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Escrito\EscritoArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escrito-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'id_escrito')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6,'style' => 'resize:none']) ?>

    <?=$form->field($model, 'portada')->dropDownList(['1' => 'Si', '0' => 'No'],['prompt'=>'-']) ?>

     <?= $form->field($model, 'id_archivo')->dropDownList(
        ArrayHelper::map(Archivo::find()->all(), 'id_archivo','titulo_archivo') ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
