<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumentalArchivo */

$this->title = 'Modificar Descripción' ;
$this->params['breadcrumbs'][] = ['label' => 'Colección Documental', 'url' => ['/gestion-documental/view', 'id' => 1]];
$this->params['breadcrumbs'][] =$this->title;
?>
<div class="gestion-documental-archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
