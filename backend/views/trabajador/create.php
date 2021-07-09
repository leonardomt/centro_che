<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Trabajador */

$this->title = 'Insertar Trabajador';
$this->params['breadcrumbs'][] = ['label' => 'Equipo de Trabajo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajador-create">

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
