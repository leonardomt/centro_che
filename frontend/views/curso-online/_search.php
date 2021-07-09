<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CursoOnline\CursoOnlineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-online-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_curso') ?>

    <?= $form->field($model, 'revisado') ?>

    <?= $form->field($model, 'publico') ?>

    <?= $form->field($model, 'contacto') ?>

    <?= $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
