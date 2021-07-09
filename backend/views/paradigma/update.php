<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Revista\Paradigma */

$this->title = 'Modificar Información de la sección Paradigma: ';
$this->params['breadcrumbs'][] = ['label' => 'Paradigma', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar Información';
?>
<div class="paradigma-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
