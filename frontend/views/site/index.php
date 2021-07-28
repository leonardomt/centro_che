        <?php

        /* @var $this yii\web\View */

        $this->title = 'Centro Che';
        $noticias = new \frontend\models\Noticia\NoticiaArchivo();
        $noticias = \frontend\models\Noticia\Noticia::find()->where(['publico' => 1])->all();
        ?>



        <div class="row" style="margin-top: -50px">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../web/img/quienessomos/main1.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px">
                            <!--<h5>Versión en modo de pruebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/main2.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                            <!--<h5>Versión en modo de pruebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/main3.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                            <!--<h5>Versión en modo de purebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/main4.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                            <!--<h5>Versión en modo de purebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/main5.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                            <!--<h5>Versión en modo de purebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="../web/img/quienessomos/main6.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block" style="margin-top: -400px ">
                            <!--<h5>Versión en modo de purebas</h5>
                            <p>Solo para propósitos de desarrollo</p>-->
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <hr class="page_separator" />

        <section class="about-section text-center" id="about">

            <h1 class="display-4">Quiénes Somos</h1>

        <br>
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <div id="carouselExampleIndicators2" class="carousel slide " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>

                    </ol>
                    <div class="carousel-inner">


                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../web/img/quienessomos/02-vista general.jpg" alt="First slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="../web/img/quienessomos/Casa.jpg" alt="Second slide">
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-5 ">
                <br>
                <p style="text-align: justify ; font-size: 1.4rem; font-weight: 300; line-height: 1.2;">El Centro de Estudios Che Guevara es la institución encargada de promover el estudio y conocimiento del pensamiento, la vida y la obra del comandante Ernesto Che Guevara, ante las actuales y futuras generaciones, tanto dentro como fuera de Cuba, por la trascendencia y validez de su legado teórico-práctico y ético, para los presentes y nuevos proyectos de emancipación humana.

                    Esa labor encuentra expresión en publicaciones, la realización de productos comunicativos y educativos, la organización y auspicio de talleres, exposiciones, conferencias y seminarios, acciones de trabajo comunitario, o cualquier otra forma que resulte adecuada a estos fines.
                </p>
            </div>



        </div>
        </section>



        <hr class="page_separator" />

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Proyectos</h1>
        </div>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h3 class="display-5" style="  font-size: 2rem; font-weight: 300; line-height: 1.2;">
                Se desarrollan disímiles proyectos con el objetivo de promover no sólo la vida y obra del Che sino tambien el quehacer institucional.</h3>
        </div>


        <iframe src="https://www.google.com/maps/d/embed?mid=1UQQMw-m_DPTKOJPfYTs3ZkFBobP39SBE&hl=es" width="100%" height="480"></iframe>
        <br>
        <br>
        <br>
        <br>
        <br>