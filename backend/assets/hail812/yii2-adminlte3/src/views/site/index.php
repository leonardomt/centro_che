<?php

use dosamigos\chartjs\ChartJs;


$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$bundle = \hail812\adminlte3\assets\PluginAsset::register($this);
$bundle->css[] = 'chart/Chart.css';
$bundle->js[] = 'chart/Chart.js';

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
        integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"
        integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-fluid">

    <div class="row">

        <!---------------------------------------------------Estadisticas Inicio-------------------------------------------->
        <div class="col-md-4">

            <div class="card card-default ">
                <div class="card-header">
                    <h3 class="card-title" data-card-widget="collapse">Publicaciones por Sección</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>


                <div class="card-body">

                    <div class="col ">
                        <div class="card collapsed-card ">
                            <div class="card-header" style="background-color: #164A7D; color: #fff">
                                <h3 class="card-title" data-card-widget="collapse">Inicio</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus" style="color: #fff"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <?php
                                    $actualidad = count(\backend\models\Noticia\Noticia::find()->all());
                                    $catalogo = count(\backend\models\Revista\Revista::find()->all());
                                    ?>
                                    <canvas id="inicio-chart" width="400" height="350"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div style="height: 16px"></div>
                        <!--------------------------------------------Estadisticas Coordinacion Academica-------------------------------->


                        <div class="card collapsed-card">
                            <div class="card-header" style="background-color: #3971A5; color: #fff">
                                <h3 class="card-title" data-card-widget="collapse">Coordinación Académica</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus" style="color: #fff"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <?php
                                    $lineas = count(\backend\models\LineaInvestigacion\LineaInvestigacion::find()->all());
                                    $investigaciones = count(\frontend\models\Investigacion\Investigacion::find()->all());
                                    $articulos = count(\backend\models\Articulo\Articulo::find()->all());
                                    $documentos = count(\backend\models\ColeccionDocumental\ColeccionDocumental::find()->all());
                                    $libros = count(\backend\models\Libro\Libro::find()->all());
                                    $cursos = count(\backend\models\CursoOnline\CursoOnline::find()->all());
                                    $clases = count(\backend\models\CursoOnline\Clase::find()->all());

                                    ?>
                                    <canvas id="coordinacion-chart" width="400" height="350"></canvas>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                        <div style="height: 16px"></div>

                        <!--------------------------------------------Estadisticas Proyectos Alternativos-------------------------------->
                        <!-- BAR CHART -->

                        <div class="card collapsed-card">
                            <div class="card-header" style="background-color: #5593C7; color: #fff">
                                <h3 class="card-title" data-card-widget="collapse">Proyectos Alternativos</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus" style="color: #fff"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <?php
                                    $talleres = count(\backend\models\Taller\Taller::find()->all());
                                    $expos = count(\backend\models\Exposicion\Exposicion::find()->all());
                                    $audiovisuales = count(\backend\models\ProductoAudiovisual\ProductoAudiovisual::find()->all());
                                    $otros = count(\backend\models\Otros\Otros::find()->all());
                                    ?>
                                    <canvas id="proyectos-chart" width="400" height="350"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div style="height: 16px"></div>
                        <!--------------------------------------------Estadisticas Vida y Obra---------------------------------------->


                        <div class="card collapsed-card">
                            <div class="card-header" style="background-color: #68A7DC; color: #fff">
                                <h3 class="card-title" data-card-widget="collapse">Vida y Obra</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus" style="color: #fff"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <?php
                                    $crono = count(\backend\models\Hecho\Hecho::find()->all());
                                    $correspondencia = count(\backend\models\Correspondencia\Correspondencia::find()->all());
                                    $escritos = count(\backend\models\Escrito\Escrito::find()->all());
                                    $discursos = count(\backend\models\Discurso\Discurso::find()->all());
                                    $testimonios = count(\backend\models\Testimonio\Testimonio::find()->all());
                                    $foto = count(\backend\models\Galeria\GaleriaVo::find(['tipo' => 1])->all());
                                    $audio = count(\backend\models\Galeria\GaleriaVo::find(['tipo' => 2])->all());
                                    $video = count(\backend\models\Galeria\GaleriaVo::find(['tipo' => 3])->all());
                                    $homenajes = count(\backend\models\Galeria\GaleriaVo::find(['tipo' => 4])->all());
                                    ?>
                                    <canvas id="vida-chart" height="350"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div style="height: 8px"></div>
                    </div>


                </div>
            </div>

        </div>
        <!--------------------------------------------Archivos Subidos-------------------------------------------------------->

        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" data-card-widget="collapse">Archivos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <?php
                        $archivoIT = count(\backend\models\Archivo\Archivo::find()->where(['tipo_archivo' => 1])->all());
                        $archivoIR = count(\backend\models\Archivo\Archivo::find()->where(['revisado' => 1, 'tipo_archivo' => 1])->all());
                        if ($archivoIT != 0) {
                            $Irev = intVal(($archivoIR / $archivoIT) * 100);
                        } else $Irev = 0;
                        $archivoAT = count(\backend\models\Archivo\Archivo::find()->where(['tipo_archivo' => 2])->all());
                        $archivoAR = count(\backend\models\Archivo\Archivo::find()->where(['revisado' => 1, 'tipo_archivo' => 2])->all());
                        if ($archivoAT != 0) {
                            $Arev = intVal(($archivoAR / $archivoAT) * 100);
                        } else $Arev = 0;
                        $archivoVT = count(\backend\models\Archivo\Archivo::find()->where(['tipo_archivo' => 3])->all());
                        $archivoVR = count(\backend\models\Archivo\Archivo::find()->where(['revisado' => 1, 'tipo_archivo' => 3])->all());
                        if ($archivoVT != 0) {
                            $Vrev = intVal(($archivoVR / $archivoVT) * 100);
                        } else $Vrev = 0;
                        ?>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-default "
                                     style="background-color: #353A3F; color: #fff">
                                    <span class="info-box-icon"><i class="far fa-image"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Imágenes: <?= $archivoIT ?></span>
                                        <div class="progress">
                                            <div class="progress-bar " style="width: <?= $Irev ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?= 100 - $Irev ?>
                                            % pendientes de revisión</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient" style="background-color: #5F6266; color: #fff">
                                    <span class="info-box-icon"><i class="fas fa-volume-up"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Audios: <?= $archivoAT ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= 100 - $Arev ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?= $Arev ?>
                                            % pendientes de revisión</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient" style="background-color: #8A8C8E; color: #fff">
                                    <span class="info-box-icon"><i class="fas fa-video"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Videos: <?= $archivoVT ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= 100 - $Vrev ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?= $Vrev ?>
                                            % pendientes de revisión</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>


        <!--------------------------------------------Comentarios --------------------------------------------------->

        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" data-card-widget="collapse">Comentarios</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <?php
                        $comInicio = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Inicio'])->all());
                        $comInicioRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Inicio', 'revisado' => 0, 'publico' => 0])->all());
                        $comCoordinacion = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Coordinación Académica'])->all());
                        $comCoordinacionRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Coordinación Académica', 'revisado' => 0, 'publico' => 0])->all());
                        $comTaller = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Proyectos Alternativos'])->all());
                        $comTallerRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Proyectos Alternativos', 'revisado' => 0, 'publico' => 0])->all());

                        ?>
                        <canvas id="comentario-chart" height="308"></canvas>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <hr class="page_separator"/>
    <!-------------------------------------------Comentarios--------------------------------------------------------->

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title" data-card-widget="collapse">Autores</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="height: 100%">
            <canvas id="bar-chart" style="height: 90%"></canvas>
            <!-----
                    <div class="">
                        <?php
            $keys = array_keys($escritores);        // return array
            $values = array_values($escritores);

            ?>

                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-warning">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">1er lugar: <?php if (isset($keys[0])) echo $keys[0]; ?></span>

                                        <span class="progress-description"><?php if (isset($values[0])) echo $values[0]; ?>
                                             artículos publicados</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-secondary">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">2do lugar: <?php if (isset($keys[1])) echo $keys[1]; ?></span>


                                        <span class="progress-description"><?php if (isset($values[1])) echo $values[1]; ?>
                                             artículos publicados</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-default">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">3er lugar: <?php if (isset($keys[2])) echo $keys[2]; ?></span>

                                        <span class="progress-description"><?php if (isset($values[2])) echo $values[2]; ?>
                                             artículos publicados</span>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                     -->
        </div>
        <div style="height: 6px"></div>
    </div>
    <br>

    <script>

        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels:
                    [
                        <?php foreach ($keys as $key):?>
                        '<?php echo $key;?>',
                        <?php endforeach; ?>
                    ],
                datasets: [
                    {
                        label: "Publicaciones",
                        backgroundColor: "#2A507F",
                        data: [
                            <?php foreach ($values as $val):?>
                            '<?php echo $val;?>',
                            <?php endforeach; ?>
                        ]
                    },
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                indexAxis: 'y',
                title: {
                    display: true,
                    text: 'Autores'
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }

            }
        });

        //------------------------------------------Inicio----------------------------------------------------------
        new Chart(document.getElementById("inicio-chart"), {
            type: 'bar',
            data: {
                labels: ["Actualidad"],
                datasets: [
                    {
                        label: "Total",
                        backgroundColor: "#164A7D",
                        data: ['<?php echo $actualidad; ?>'],
                        barThickness: 50,  // number (pixels) or 'flex'
                        maxBarThickness: 80 // number (pixels)
                    },
                ]
            },
            options: {
                scales: {
                    x: {
                        max: parseInt('<?php echo $actualidad + 5; ?>'),
                        min: 0,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 12,
                            }
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 12,
                            }
                        },
                    }

                },
                indexAxis: 'y',

                title: {
                    display: true,
                    text: 'Inicio'
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        //------------------------------------------Coordinacion Academica ----------------------------------------------------
        new Chart(document.getElementById("coordinacion-chart"), {
            type: 'bar',
            data: {
                labels: ["Investigaciones", "Artículos", "Documentos", "Cursos Online"],
                datasets: [
                    {
                        label: "Total",
                        backgroundColor: "#3971A5",
                        data: [ '<?php echo $investigaciones; ?>', '<?php echo $articulos; ?>', '<?php echo $documentos; ?>',  '<?php echo $cursos; ?>']
                    },

                ]
            },

            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: 'Coordinación Académica'
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        //------------------------------------------Proyectos Alternativos ---------------------------------------------
        new Chart(document.getElementById("proyectos-chart"), {
            type: 'bar',
            data: {
                labels: ["Talleres", "Exposiciones", ["Productos","Audiovisuales"], ["Otros", "Productos"]],
                datasets: [
                    {
                        label: "Total",
                        backgroundColor: "#5593C7",
                        data: ['<?php echo $talleres; ?>', '<?php echo $expos; ?>', '<?php echo $audiovisuales; ?>', '<?php echo $otros; ?>']
                    },
                ]
            },

            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: 'Proyectos Alternativos'
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });


        //------------------------------------------Vida y Obra---- ----------------------------------------------------
        new Chart(document.getElementById("vida-chart"), {
            type: 'bar',
            data: {
                labels: [ "Correspondencias", "Escritos",["D. y Entrevistas"], "Testimonios", "G. de Fotografías", "G. de Audios", "G. de Videos", "G. de Homenajes"],
                datasets: [
                    {
                        label: "Total",
                        backgroundColor: "#68A7DC",
                        data: [ '<?php echo $correspondencia; ?>', '<?php echo $escritos; ?>', '<?php echo $discursos; ?>', '<?php echo $testimonios; ?>', '<?php echo $foto; ?>', '<?php echo $audio; ?>', '<?php echo $video; ?>', '<?php echo $homenajes; ?>']
                    },
                ]
            },


            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: 'Vida y Obra'
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        new Chart(document.getElementById("comentario-chart"), {
            type: 'bar',
            data: {
                labels: ['Actualidad', 'Artículos ', ['Proyectos', 'Comunitarios']],
                datasets: [
                    {
                        label: "Total",
                        backgroundColor: "#164A7D",
                        data: ['<?= $comInicio ?>', '<?= $comCoordinacion ?>', '<?= $comTaller ?>']
                    },
                    {
                        label: "Sin Revisar",
                        backgroundColor: "#8A8C8E",
                        data: ['<?= $comInicioRev ?>', '<?= $comCoordinacionRev ?>', '<?= $comTallerRev ?>']
                    },
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            stepSize: 1
                        }
                    },
                    y: {
                        ticks: {
                            stepSize: 1
                        }
                    }
                },

                title: {
                    display: true,
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }

            }
        });


    </script>





