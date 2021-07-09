<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\Discurso */

$this->title = 'Modificar Discurso o Entrevista: ' . $model->id_discurso;
$this->params['breadcrumbs'][] = ['label' => 'Discursos y Entrevistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_discurso, 'url' => ['view', 'id' => $model->id_discurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discurso-update">

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
