<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model backend\models\ProductoAudiovisual\ProductoAudiovisualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-audiovisual-search">
    <?php yii\widgets\Pjax::begin(['id' => 'producto-audiovisual-search']) ?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => true
        ],
    ]);
    ?>

    <br><br><br>
    <div class="row">
        <?php // echo $form->field($model, 'id_archivo') ?>
        <div class="col-md-1">
            <?=$form->field($model, 'revisado')->dropDownList(['1' => 'Sí', '0' => 'No'],['prompt'=>'-']) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'publico')->dropDownList(['1' => 'Sí', '0' => 'No'],['prompt'=>'-']); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'titulo') ?>
        </div>
        <div class="col-md-2">
            <?php  echo $form->field($model, 'tipo') ?>
        </div>
        <div class="col-md-3">
            <?php  echo $form->field($model, 'descripcion') ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <button type="reset" class="btn btn-outline-secondary " ><a href="<?=Yii::$app->homeUrl?>?r=producto-audiovisual"> Reiniciar </a></button>
    </div>

    <?php ActiveForm::end(); ?>

    <?php yii\widgets\Pjax::end() ?>
</div>


