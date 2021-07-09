<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\GestionDocumental\GestionDocumental */

$this->title = 'Modificar descripción de la portada de la Colección Documental';
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="gestion-documental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>