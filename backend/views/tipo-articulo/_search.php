<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Articulo\TipoArticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-articulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

        <div class="col-md-2" style="padding-left: 0px">
            <?php $listData=  \yii\helpers\ArrayHelper::map(\backend\models\Articulo\TipoArticulo::find()->all(), 'tipo_articulo','tipo_articulo'); ?>
            <?= $form->field($model, 'tipo_articulo')->dropDownList($listData, ['prompt'=>'Seleccionar'])?>
        </div>
    <br><br><br><br>
        <div class="form-group">
         <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
            <button type="reset" class="btn btn-outline-secondary " ><a href="<?=Yii::$app->homeUrl?>?r=tipo-articulo"> Reiniciar </a></button>
        </div>

    <?php ActiveForm::end(); ?>

</div>
