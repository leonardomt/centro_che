<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Quienes */

$this->title = 'Create Quienes';
$this->params['breadcrumbs'][] = ['label' => 'Quienes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quienes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
