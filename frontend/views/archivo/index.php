<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Archivo\Archivo;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Archivo\ArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archivos';
$this->params['breadcrumbs'][] = $this->title;


$archivos = new Archivo();
$archivos = Archivo::find()->all();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>

    img {
        max-width: 100%;
        height: auto;
    }

    ul li {
        list-style: none
    }

    a, a:hover {
        text-decoration: none;
        box-shadow: none;
        outline: none;

    }

    h1 {
        text-align: center;
        margin: 0px 0;
        color: #fff;
    }

    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        color: #828735;
        background-color: #828735;
        border-color: #828735 #828735 #828735;
    }

</style>
<h1>Galería</h1>
<!-- Grid row -->
<br>

<br><br>


<!------ Include the above in your HEAD tag ---------->
<!-- Nav tabs -->

<div class=" col-md-10 offset-md-1">
    <ul class="nav nav-tabs "  style="border-bottom: 3px solid #828735;">
        <li class="nav-item" style="width: 20%">
            <a class="nav-link active" style="color: black;" data-toggle="tab" href="#home">Infancia</a>
        </li>
        <li class="nav-item" style="width: 20%">
            <a class="nav-link" data-toggle="tab" style="color: black;" href="#menu1">Adolescencia</a>
        </li>
        <li class="nav-item" style="width: 20%">
            <a class="nav-link" data-toggle="tab" style="color: black;" href="#menu2">Adulto Joven</a>
        </li>
        <li class="nav-item" style="width: 20%">
            <a class="nav-link" data-toggle="tab" style="color: black;" href="#menu3">Adulto</a>
        </li>
        <li class="nav-item" style="width: 20%">
            <a class="nav-link" data-toggle="tab" style="color: black;" href="#menu4">Posterior a 1967</a>
        </li>
    </ul>

    <!-- Tab panes -->

    <div class="tab-content">
        <div class="tab-pane container active" style="padding: 0px" id="home">
            <div class="hls_sol">
                <ul>
                    <li>
                        <div class="img-gallery">
                            <img style="" src="../web/img/2.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <div class="hls_data">
                                <a href="../web/img/6.jpg" target="_blank" class="hls_title">Some quick example text
                                    to build on the card title and make up the bulk of the
                                    card's content. </a>
                                <a href="..." target="_blank"> Ver más</a>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/4.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/2.jpg" target="_blank" class="hls_title">Ravi On 500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/6.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">

                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Descripción de
                                    Ejemplo para probar como se vería la descripción</a>
                                <a href="..." target="_blank"> Ver más</a>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/1.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/3.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/5.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Dapper</h3>
                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="https://www.facebook.com/ravi7284007" class="btn btn-pro" target="_blank">
                                    Facebook</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/2.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/3.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/4.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Dapper</h3>
                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="https://www.facebook.com/ravi7284007" class="btn btn-pro" target="_blank">
                                    Facebook</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/6.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/2.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>


                </ul>

            </div>
        </div>
        <div class="tab-pane container fade" id="menu1">
            <div class="hls_sol">
                <ul>
                    <li>
                        <div class="img-gallery">
                            <img style="" src="../web/img/4.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <div class="hls_data">
                                <a href="../web/img/1.jpg" target="_blank" class="hls_title">Some quick example text
                                    to build on the card title and make up the bulk of the
                                    card's content. </a>
                                <a href="..." target="_blank"> Ver más</a>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/1.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/2.jpg" target="_blank" class="hls_title">Ravi On 500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/3.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">

                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Descripción de
                                    Ejemplo para probar como se vería la descripción</a>
                                <a href="..." target="_blank"> Ver más</a>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/5.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/1.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/6.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Dapper</h3>
                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="https://www.facebook.com/ravi7284007" class="btn btn-pro" target="_blank">
                                    Facebook</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/2.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/3.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/4.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Dapper</h3>
                            <div class="hls_data">
                                <a href="https://500px.com/ravi7284007" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="https://www.facebook.com/ravi7284007" class="btn btn-pro" target="_blank">
                                    Facebook</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/6.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Casual</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="img-gallery">
                            <img src="../web/img/2.jpg"
                                 alt="">
                        </div>
                        <div class="hls_sol_data">
                            <h3>Street</h3>
                            <div class="hls_data">
                                <a href="../web/img/quienessomos/3333.jpg" target="_blank" class="hls_title">Ravi On
                                    500PX</a>
                                <a href="..." class="btn btn-pro" target="_blank"> Facebook</a>
                            </div>
                        </div>
                    </li>


                </ul>

            </div>
        </div>
        <div class="tab-pane container fade" id="menu2">...</div>
    </div>
</div>




<br><br><br><br><br>


<script src="js/jquery-3.4.1.min.js"></script>

<script>
    $(document).on("click", '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    function setVideoSize() {
        const vidWidth = 1920;
        const vidHeight = 1080;
        let windowWidth = window.innerWidth;
        let newVidWidth = windowWidth;
        let newVidHeight = windowWidth * vidHeight / vidWidth;
        let marginLeft = 0;
        let marginTop = 0;

        if (newVidHeight < 500) {
            newVidHeight = 500;
            newVidWidth = newVidHeight * vidWidth / vidHeight;
        }

        if (newVidWidth > windowWidth) {
            marginLeft = -((newVidWidth - windowWidth) / 2);
        }

        if (newVidHeight > 720) {
            marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
        }

        const tmVideo = $('#tm-video');

        tmVideo.css('width', newVidWidth);
        tmVideo.css('height', newVidHeight);
        tmVideo.css('margin-left', marginLeft);
        tmVideo.css('margin-top', marginTop);
    }

    $(document).ready(function () {
        /************** Video background *********/

        setVideoSize();

        // Set video background size based on window size
        let timeout;
        window.onresize = function () {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background
        const btn = $("#tm-video-control-button");

        btn.on("click", function (e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    })
</script>




