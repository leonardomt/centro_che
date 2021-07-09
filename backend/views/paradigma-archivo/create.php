<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model backend\models\Revista\ParadigmaArchivo */

$this->title = 'Insertar Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Paradigma', 'url' => ['/paradigma/view', 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paradigma-archivo-create">

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
