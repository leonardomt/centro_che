<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Homenaje\TipoHomenaje */

$this->title = 'Crear Tipo de Homenaje';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de Homenajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-homenaje-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
