<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Archivo\TipoArchivo;

/* @var $this yii\web\View */
/* @var $model backend\models\Archivo\Archivo */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Modificar: ' . $model->titulo_archivo;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo_archivo, 'url' => ['view', 'id' => $model->id_archivo]];
$this->params['breadcrumbs'][] = 'Modificar';
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']));
?>
<div class="archivo-update col-md-12">

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

    <div>

        <div>
            <?php if($model->tipo_archivo  == 3):?>
                <video  controls autoplay class="col-md-10 col-md-offset-1">
                    <source src="../../frontend/web/<?=$model->url_archivo?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php endif; if ($model->tipo_archivo  == 1 ):?>
                <img alt="picture" class="img-fluid img-fluid col-md-10 col-md-offset-1" src="../../frontend/web/<?=$model->url_archivo?>">
            <?php endif; if ($model->tipo_archivo  == 2 ):?>
                <audio controls class="col-md-10 col-md-offset-1">
                    <source src="../../frontend/web/<?=$model->url_archivo?>">
                    Your browser does not support the <code>audio</code> element.
                </audio>
            <?php endif;?>
        </div>

    </div>
</div>
