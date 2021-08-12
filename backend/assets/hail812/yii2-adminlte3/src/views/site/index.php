<?php

use dosamigos\chartjs\ChartJs;


$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$bundle = \hail812\adminlte3\assets\PluginAsset::register($this);
$bundle->css[] = 'chart/Chart.css';
$bundle->js[] = 'chart/Chart.js';

?>
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
                        <div class="card card-primary collapsed-card ">
                            <div class="card-header">
                                <h3 class="card-title" data-card-widget="collapse">Inicio</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <?php
                                    $actualidad = count(\backend\models\Noticia\Noticia::find()->all());
                                    ?>
                                    <?= ChartJs::widget([
                                        'type' => 'bar',
                                        'options' => [
                                            'height' => 400,
                                            'width' => 400
                                        ],
                                        'data' => [
                                            'labels' => ["Actualidad"],
                                            'datasets' => [
                                                [
                                                    'label' => "Cantidad",
                                                    'backgroundColor' => "#007bff",
                                                    'borderColor' => "#007bff",
                                                    'pointBackgroundColor' => "#007bff",
                                                    'pointBorderColor' => "#fff",
                                                    'pointHoverBackgroundColor' => "#fff",
                                                    'pointHoverBorderColor' => "#007bff",
                                                    'data' => [$actualidad]
                                                ],

                                            ]
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->


                        <!--------------------------------------------Estadisticas Coordinacion Academica-------------------------------->


                        <div class="card card-info collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title" data-card-widget="collapse">Coordinación Académica</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
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
                                    <?= ChartJs::widget([
                                        'type' => 'bar',
                                        'options' => [
                                            'height' => 400,
                                            'width' => 400
                                        ],
                                        'data' => [
                                            'labels' => ["Artículos", "Líneas de Investigación", "Investigaciones", "Documentos", "Libros", "Cursos Online", "Clases"],
                                            'datasets' => [
                                                [
                                                    'label' => "Cantidad",
                                                    'backgroundColor' => "#17a2b8",
                                                    'borderColor' => "#17a2b8",
                                                    'pointBackgroundColor' => "#17a2b8",
                                                    'pointBorderColor' => "#fff",
                                                    'pointHoverBackgroundColor' => "#fff",
                                                    'pointHoverBorderColor' => "#17a2b8",
                                                    'data' => [$articulos, $lineas, $investigaciones, $documentos, $libros, $cursos, $clases]
                                                ],

                                            ]
                                        ]
                                    ]);
                                    ?>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->


                        <!--------------------------------------------Estadisticas Proyectos Alternativos-------------------------------->
                        <!-- BAR CHART -->

                        <div class="card card-success collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title" data-card-widget="collapse">Proyectos Alternativos</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
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
                                    <?= ChartJs::widget([
                                        'type' => 'bar',
                                        'options' => [
                                            'height' => 400,
                                            'width' => 400
                                        ],
                                        'data' => [
                                            'labels' => ["Talleres", "Exposiciones", "Productos Audiovisuales", "Otros"],
                                            'datasets' => [
                                                [
                                                    'label' => "Cantidad",
                                                    'backgroundColor' => "#28a745",
                                                    'borderColor' => "#28a745",
                                                    'pointBackgroundColor' => "#28a745",
                                                    'pointBorderColor' => "#fff",
                                                    'pointHoverBackgroundColor' => "#fff",
                                                    'pointHoverBorderColor' => "#28a745",
                                                    'data' => [$talleres, $expos, $audiovisuales, $otros]
                                                ],

                                            ]
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!--------------------------------------------Estadisticas Vida y Obra---------------------------------------->


                        <div class="card card-danger collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title" data-card-widget="collapse">Vida y Obra</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
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
                                    <?= ChartJs::widget([
                                        'type' => 'bar',
                                        'options' => [
                                            'height' => 400,
                                            'width' => 400
                                        ],
                                        'data' => [
                                            'labels' => ["Cronología", "Correspondencias", "Escritos", "Discursos y Entrevistas", "Testimonios", "Galería de Fotografías", "Galería de Audios", "Galería de Videos", "Galería de Homenajes"],
                                            'datasets' => [
                                                [
                                                    'label' => "Cantidad",
                                                    'backgroundColor' => "#dc3545",
                                                    'borderColor' => "#dc3545",
                                                    'pointBackgroundColor' => "#dc3545",
                                                    'pointBorderColor' => "#fff",
                                                    'pointHoverBackgroundColor' => "#fff",
                                                    'pointHoverBorderColor' => "#dc3545",
                                                    'data' => [$crono, $correspondencia, $escritos, $discursos, $testimonios, $foto, $audio, $video, $homenajes]
                                                ],

                                            ]
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

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
                                <div class="info-box bg-gradient-primary ">
                                    <span class="info-box-icon"><i class="far fa-image"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Imágenes: <?= $archivoIT ?></span>
                                        <div class="progress">
                                            <div class="progress-bar " style="width: <?= $Irev ?>%"></div>
                                        </div>
                                        <span class="progress-description"><?= 100-$Irev ?>
                                            % pendientes de revisión</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-info">
                                    <span class="info-box-icon"><i class="fas fa-volume-up"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Audios: <?= $archivoAT ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= 100-$Arev ?>%"></div>
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
                                <div class="info-box bg-gradient-warning">
                                    <span class="info-box-icon"><i class="fas fa-video"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">Total de Videos: <?= $archivoVT ?></span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?= 100-$Vrev ?>%"></div>
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


        <!--------------------------------------------Escritores Destacados --------------------------------------------------->

        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title" data-card-widget="collapse">Autores Destacados</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <?php
                        $keys = array_keys($escritores);		// return array
                        $values = array_values($escritores);

                        ?>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-warning">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">1er lugar: <?php if(isset($keys[0])) echo $keys[0]; ?></span>

                                        <span class="progress-description"><?php if(isset($values[0])) echo $values[0]; ?>
                                             artículos publicados</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-secondary">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">2do lugar: <?php if(isset($keys[1])) echo $keys[1]; ?></span>


                                        <span class="progress-description"><?php if(isset($values[1])) echo $values[1]; ?>
                                             artículos publicados</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="info-box bg-gradient-default">
                                    <span class="info-box-icon"><i class="fas fa-book"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-number">3er lugar: <?php if(isset($keys[2])) echo $keys[2]; ?></span>

                                        <span class="progress-description"><?php if(isset($values[2])) echo $values[2]; ?>
                                             artículos publicados</span>
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
    </div>
    <hr class="page_separator"/>
    <!-------------------------------------------Comentarios--------------------------------------------------------->

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
                $comInicioRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Inicio', 'revisado' =>0, 'publico' =>0])->all());
                $comCoordinacion = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Coordinación Académica'])->all());
                $comCoordinacionRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Coordinación Académica', 'revisado' =>0, 'publico' =>0])->all());
                $comTaller = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Proyectos Alternativos'])->all());
                $comTallerRev = count(\backend\models\Comentario\Comentario::find()->where(['seccion' => 'Proyectos Alternativos', 'revisado' =>0, 'publico' =>0])->all());

                ?>
                <?= ChartJs::widget([
                    'type' => 'bar',
                    'options' => [
                        'height' => 180,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => ["Actualidad", "Artículos", "Proyectos Comunitarios"],
                        'datasets' => [
                            [
                                'label' => "Total de Comentarios",
                                'backgroundColor' => "#007bff",
                                'borderColor' => "#007bff",
                                'pointBackgroundColor' => "#007bff",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "#007bff",
                                'data' => [$comInicio, $comCoordinacion, $comTaller]
                            ],
                            [
                                'label' => "Pendientes de Revisión",
                                'backgroundColor' => "#ffc107",
                                'borderColor' => "#ffc107",
                                'pointBackgroundColor' => "#ffc107",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "#ffc107",
                                'data' => [$comInicioRev, $comCoordinacionRev, $comTallerRev]
                            ],

                        ]
                    ]
                ]);
                ?>
            </div>


        </div>
    </div>

    <hr class="page_separator"/>


</div>


<!-- ./col -->



