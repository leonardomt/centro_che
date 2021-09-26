<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Noticia\Noticia */

$this->title = 'Modificar Noticia: ' . $model->titulo_noticia;
$this->params['breadcrumbs'][] = ['label' => 'Noticias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo_noticia, 'url' => ['view', 'id' => $model->id_noticia]];
$this->params['breadcrumbs'][] = 'Modificar';

if (Yii::$app->user->isGuest)
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));

?>


<div class="noticia-update col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsArchivo' => $modelsArchivo,
    ]) ?>


</div>

<script>

</script>

