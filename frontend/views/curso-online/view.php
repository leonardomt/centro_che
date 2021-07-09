<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\CursoOnline\CursoOnlineArchivo;
use frontend\models\Archivo\Archivo;


/* @var $this yii\web\View */
/* @var $model frontend\models\CursoOnline\CursoOnline */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Curso Online', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$articuloarchivos = new CursoOnlineArchivo();
$articuloarchivos= CursoOnlineArchivo::find()->where(['id_curso_online' => $model->id_curso])->all();
$archivos = new Archivo();


?>
<div class="curso-online-view">

    <?= \yii\bootstrap4\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'contacto:ntext',
            'titulo:ntext',
            'descripcion:ntext',
        ],
    ]) ?>


    <?php

    $articuloarchivos = new CursoOnlineArchivo();
    $articuloarchivos= CursoOnlineArchivo::find()->where(['id_curso_oline' => $model->id_curso])->all();
    $archivos = new Archivo();
    ?>

    <?php foreach( $articuloarchivos as $artas): ?>
        <?php    $archivos = Archivo::find()->where(['id_archivo' => $artas->id_archivo ])->all()  ; ?>
        <?php foreach($archivos as $arc): ?>


            <div class="mb-3 pics animation all  " >
                <a href="<?php echo Yii::$app->homeUrl?>?r=archivo%2Fview&id=<?=$arc->id_archivo?>">
                    <?php if($arc->tipo_archivo  == 3):?>
                        <video  controls autoplay style="width: 500px">
                            <source src="../../frontend/web/<?=$arc->url_archivo?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; if ($arc->tipo_archivo  == 1 ):?>
                        <img alt="picture" class="img-fluid img-fluid" style="width: 500px" src="../../frontend/web/<?=$arc->url_archivo?>">
                    <?php endif; ?>
                </a>

            </div>

            <br>

        <?php endforeach; ?>
    <?php endforeach; ?>

</div>
