<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\ColeccionDocumental\ColeccionDocumentalArchivo */

$this->title = 'Crear Colección Documental Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Colección Documental Archivo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="coleccion-documental-archivo-create col-md-12">

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
