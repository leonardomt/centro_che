<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use \backend\models\Articulo\ArticuloArchivo;
use \backend\models\Archivo\Archivo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Articulo\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Artículos';
$this->params['breadcrumbs'][] = $this->title;


?>





<style type="text/css">
    .panel-header{
        height: 42px;
    }
    h2{
        margin-bottom: 20px;
    }

    .panel-default img{
        -webkit-transition:-webkit-transform 0.3s ease-in-out 0.1s;
    }

    .panel-default img:hover {
        -webkit-transform:scale(1.05);
        box-shadow: 20px 20px 80px rgba(0,0,0, .5);

    }

    h5{
        color:rgba(10,34,10 , 0.95);

    }


    #subrayar{
        border-bottom: 2px solid rgba(0,0,0, .5);
    }


</style>
<div class="container text-center">
    <div class="articulo-index">
        <div class= "option animated fadeInDown " >
            <center><h1>Art<a id="subrayar">ícu</a>los</h1></center>
        </div>
        <br><br>

        <div class = "row">


            <?php $x=0; foreach($model as $row): ?>
                <?php
                $articuloarchivos = new ArticuloArchivo();
                $articuloarchivos= ArticuloArchivo::find()->where(['id_articulo' => $row->id_articulo])->all();
                $archivos[] = new Archivo(); $i=0;
                foreach ($articuloarchivos as $artArc){
                    $archivos[$i]=Archivo::find()->where(['id_archivo' => $artArc->id_archivo])->one();
                    $i++;
                }
                $y =0 ;
                if ($row->publico):
                ?>

                <div class="col-md-4">
                    <div class= "option animated fadeInDown">
                        <div class="panel-default">
                            <div class="panel-header" style="background-color: transparent;color:  black;">
                                <a href="<?php echo Yii::$app->homeUrl?>?r=articulo%2Fview&id=<?=$row->id_articulo?>"  ><h2 style="color: #0b2e13"> <?= $row->titulo?> </h2></a>
                            </div>
                            <div class="panel-body" style="background-color: transparent;color: black; ">
                                <a href="<?php echo Yii::$app->homeUrl?>?r=articulo%2Fview&id=<?=$row->id_articulo?>">
                                    <?php if ((sizeof($archivos) > 0)  ):
                                        if (($archivos[0]->tipo_archivo == 1 )): $y=1;?>
                                            <img   src="../web/<?=$archivos[0]->url_archivo?>" class="img-responsive" style="width:100% " alt="Image" >
                                        <?php endif;?>
                                        <?php if (($archivos[0]->tipo_archivo == 3 )): $y=1;?>
                                            <video class="img-responsive"  controls autoplay>
                                                <source src="<?=$archivos[0]->url_archivo?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        <?php endif;?>
                                        <?php if (($archivos[0]->tipo_archivo == 2 )): $y=1;?>
                                        <img   src="../web/img/quienessomos/main.jpg" class="img-responsive" style="width:100% " alt="Image" >
                                        <?php endif;?>



                                    <?php endif; if ($y==0  ):?>
                                    <img   src="../web/img/quienessomos/main.jpg" class="img-responsive" style="width:100% " alt="Image" >
                                    <?php endif;?>
                                </a>
                                <h5>
                                    <?php
                                    $text = $row->resumen;
                                    $text=substr($text  , 0, 150);
                                    ?>
                                    <p class="card-text" style="text-align: justify"><?php echo $text;?>...</p>

                                </h5>
                                <address>
                                    <em>
                                        por <?= $row->autor?> | <?= $row->fecha?>
                                    </em>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;unset($articuloarchivos); unset($archivos); $x++; endforeach ?>


        </div>







    </div>

</div>