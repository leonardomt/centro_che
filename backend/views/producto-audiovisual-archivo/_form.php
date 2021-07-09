<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Archivo\Archivo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductoAudiovisual\ProductoAudiovisualArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-audiovisual-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto_audiovisual')->dropDownList(
        ArrayHelper::map(\backend\models\ProductoAudiovisual\ProductoAudiovisual::find()->all(), 'id_producto_audiovisual','titulo') )?>

    <?= $form->field($model, 'id_archivo')->dropDownList(
        ArrayHelper::map(Archivo::find()->all(), 'id_archivo','titulo_archivo') ) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
