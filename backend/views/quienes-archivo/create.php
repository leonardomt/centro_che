<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Quienes\QuienesArchivo */

$this->title = 'Insertar imagen';
$this->params['breadcrumbs'][] = ['label' => 'Quiénes Somos', 'url' => ['/quienes/view' , 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quienes-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
