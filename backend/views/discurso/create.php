<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Discurso\Discurso */

$this->title = 'Insertar Discurso o Enrevista';
$this->params['breadcrumbs'][] = ['label' => 'Discursos y Entrevistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-discurso'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="discurso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
