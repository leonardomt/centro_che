<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\CursoOnline\CursoOnlineArchivo */

$this->title = 'Modificar Curso Online Archivo: ' . $model->id_curso_online_archivo;
$this->params['breadcrumbs'][] = ['label' => 'CursoOnlineArchivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_curso_online_archivo, 'url' => ['view', 'id' => $model->id_curso_online_archivo]];
$this->params['breadcrumbs'][] = 'Modificar';
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="curso-online-archivo-update col-md-12">

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
