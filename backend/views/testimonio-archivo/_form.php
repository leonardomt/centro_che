<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Archivo\Archivo;
/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\TestimonioArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonio-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

 	<?=$form->field($model, 'id_testimonio')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

  	<?=$form->field($model, 'portada')->dropDownList(['1' => 'Sí', '0' => 'No'],['prompt'=>'-']) ?>

   	<?= $form->field($model, 'id_archivo')->dropDownList(
        ArrayHelper::map(Archivo::find()->all(), 'id_archivo','titulo_archivo') ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
