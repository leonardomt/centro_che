<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Archivo\Archivo;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\CursoOnlineArchivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-online-archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_curso_online')->dropDownList(
        ArrayHelper::map(\backend\models\CursoOnline\CursoOnline::find()->all(), 'id_curso','titulo') )?>

    <?= $form->field($model, 'id_archivo')->dropDownList(
        ArrayHelper::map(Archivo::find()->all(), 'id_archivo','titulo_archivo') ) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
