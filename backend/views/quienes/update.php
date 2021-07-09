<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\Quienes */

$this->title = 'Modificar Descripción ';
$this->params['breadcrumbs'][] = ['label' => 'Quiénes Somos', 'url' => ['/quienes/view', 'id' => 1]];
$this->params['breadcrumbs'][] = 'Modificar Descripción';
?>
<div class="quienes-update">

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
