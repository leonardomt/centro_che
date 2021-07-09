<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumentalArchivo */

$this->title = 'Insertar imagen al carrusel';
$this->params['breadcrumbs'][] = ['label' => 'Gestion Documental Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gestion-documental-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
