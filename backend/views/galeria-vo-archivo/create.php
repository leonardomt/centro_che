<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeria\GaleriaVoArchivo */

$this->title = 'Create Galeria Vo Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Galeria Vo Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeria-vo-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
