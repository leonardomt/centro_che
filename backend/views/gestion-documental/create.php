<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumental */

$this->title = 'Portada Colección Documental';
$this->params['breadcrumbs'][] = ['label' => 'Gestion Documentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gestion-documental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2]) ?>

    <?= $form->field($modelArchivo, 'url[]')->widget(\kartik\file\FileInput::classname(), [
        'options' => ['multiple' => 'true'],
    ]) ?>

    
<?php \yii\widgets\ActiveForm::end(); ?>

</div>
