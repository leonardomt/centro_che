<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Testimonio\Testimonio */

$this->title = 'Update Testimonio: ' . $model->id_testimonio;
$this->params['breadcrumbs'][] = ['label' => 'Testimonios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_testimonio, 'url' => ['view', 'id' => $model->id_testimonio]];
$this->params['breadcrumbs'][] = 'Update';

if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
if ( !Yii::$app->user->can('gestionar-noticia'))
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

    
?>
<div class="testimonio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
