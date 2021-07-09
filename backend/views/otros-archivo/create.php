<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Otros\OtrosArchivo */

$this->title = 'Create Otros Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Otros Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="otros-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
