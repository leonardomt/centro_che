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
$archivos= Archivo::find()->all();
?>
<link rel="stylesheet" href="css/templatemo-video-catalog.css">

<h1>Galería</h1>
<!-- Grid row -->
<br>
<div class="gallery" id="gallery">
    <div id="mdb-lightbox-ui"></div>

    <div class="mdb-lightbox no-margin">
    <!-- Grid column -->
    <?php
        $i=0;
        $j=1;
    ?>

    <?php foreach($archivos as $arc): ?>
        <?php
        if ($i%2){
            $j=2;}
        else {$j=1;};
        ?>
        <figure class="">
        <div class="mb-3 pics animation all <?=$j;?>">
            <a href="<?php echo Yii::$app->homeUrl?>?r=archivo%2Fview&id=<?=$arc->id_archivo?>"  data-size="1600x1067">

                <?php if($arc->tipo_archivo  == 3):?>
                    <video  controls autoplay>
                        <source src="<?=$arc->url_archivo?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; if ($arc->tipo_archivo  == 1 ):?>
                <img alt="picture" class="img-fluid img-fluid" src="<?=$arc->url_archivo?>">
                <?php endif;  if ($arc->tipo_archivo  == 2 ):?>

                <audio controls>
                    <source src="../../frontend/web/<?=$arc->url_archivo?>">
                    Your browser does not support the <code>audio</code> element.
                </audio>
                <?php endif; ?>
            </a>
        </div>
        </figure>
    <?php $i++;?>
    <?php endforeach; ?>

    </div>
</div>
<br><br><br><br><br>
<hr class="page_separator"/>
<br><br>










<script src="js/jquery-3.4.1.min.js"></script>

<script>
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

        if(newVidWidth > windowWidth) {
            marginLeft = -((newVidWidth - windowWidth) / 2);
        }

        if(newVidHeight > 720) {
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




