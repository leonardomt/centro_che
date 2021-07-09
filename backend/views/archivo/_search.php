<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Archivo\TipoArchivo;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\ArchivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <br><br><br>
    <div class="row">
    <?php // echo $form->field($model, 'id_archivo') ?>
        <div class="col-md-1">
            <?=$form->field($model, 'revisado')->checkBox(['label' => 'Revisado',
                'uncheck' => '0', 'checked' => '1']) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'publico')->checkBox(['label' => 'Público',
                'uncheck' => '0', 'checked' => '1']) ?>
        </div>
        <div class="col-md-2">
    <?= $form->field($model, 'titulo_archivo') ?>
        </div>
        <div class="col-md-2">
            <?php $listData=  ArrayHelper::map(TipoArchivo::find()->all(), 'id_tipo_archivo','tipo_archivo'); ?>
            <?= $form->field($model, 'tipo_archivo')->dropDownList( $listData,
                ['prompt'=>'Seleccionar']
            ) ?>
        </div>
        <div class="col-md-2">
    <?php  echo $form->field($model, 'autor_archivo') ?>
        </div>
        <div class="col-md-4">
    <?php  echo $form->field($model, 'descripcion_archivo') ?>
        </div>
    <?php // echo $form->field($model, 'url_archivo') ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <button type="reset" class="btn btn-outline-secondary" ><a href="<?=Yii::$app->homeUrl?>?r=archivo">Reset</a></button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
