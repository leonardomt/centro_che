<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumentalArchivo */

$this->title = 'Insertar imagen al carrusel';
$this->params['breadcrumbs'][] = ['label' => 'Colección Documental', 'url' => ['/gestion-documental/view', 'id' => 1]];
$this->params['breadcrumbs'][] =$this->title;
?>
<div class="gestion-documental-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
