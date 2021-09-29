<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumental */

$this->title = 'Portada Colección Documental';
$this->params['breadcrumbs'][] = ['label' => 'Colección Documental - Portada', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-coordinacion'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>
<div class="gestion-documental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \kartik\form\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2,'style' => 'resize:none']) ?>

    <?= $form->field($modelArchivo, 'url[]')->widget(\kartik\file\FileInput::classname(), [
        'options' => ['multiple' => 'true'],
    ]) ?>

    
<?php \kartik\form\ActiveForm::end(); ?>

</div>
