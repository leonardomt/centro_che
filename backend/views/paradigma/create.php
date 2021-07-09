<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Revista\Paradigma */

$this->title = 'Create Paradigma';
$this->params['breadcrumbs'][] = ['label' => 'Paradigmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paradigma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
