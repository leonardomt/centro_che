<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Hecho\HechoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hechos';
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
    <div class="hecho-index">
        <div class= "option animated fadeInDown " >
            <center><h1>H<a id="subrayar">ech</a>os</h1></center>
        </div>
        <br><br>
        <div class = "row">


            <?php foreach($model as $row): ?>
                <div class="col-md-4">
                    <div class= "option animated fadeInDown">
                        <div class="panel-default">
                            <div class="panel-header" style="background-color: transparent;color:  black;">
                                <h2> <?= $row->titulo?> </h2>
                            </div>
                            <div class="panel-body" style="background-color: transparent;color: black;">
                                <a href="#">
                                    <img   src="../web/img/quienessomos/main.jpg" class="img-responsive" style="width:100% " alt="Image" >
                                </a>
                                <h5>
                                    <?php
                    
                                    ?>
                                    <p class="card-text" style="text-align: justify"><?php $row->titulo;?>...</p>

                                </h5>
                                <address>
                                    <em>
                                        <?= $row->fecha?>
                                    </em>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>







    </div>

</div>


