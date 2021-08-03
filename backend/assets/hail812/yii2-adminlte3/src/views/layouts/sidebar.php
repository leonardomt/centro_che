<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
   <img src="img/logo/che_positivo.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        
        <span class="brand-text font-weight-light">Menu</span>
    </a>
    <?php
    $actualidadrev = count(\backend\models\Noticia\Noticia::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $actualidad = '<span class="badge badge-info right">'.$actualidadrev.'</span>';
    } else $actualidad = '';

    $archivorev = count(\backend\models\Archivo\Archivo::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $archivo = '<span class="badge badge-info right">'.$archivorev.'</span>';
    } else $archivo = '';

    $lineasrev = count(\backend\models\LineaInvestigacion\LineaInvestigacion::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $lineas = '<span class="badge badge-info right">'.$lineasrev.'</span>';
    } else $lineas = '';

    $revistarev = count(\backend\models\Revista\Revista::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $revista = '<span class="badge badge-info right">'.$revistarev.'</span>';
    } else $revista = '';

    $investigacionrev = count(\backend\models\Investigacion\Investigacion::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $investigacion = '<span class="badge badge-info right">'.$investigacionrev.'</span>';
    } else $investigacion = '';

    $articulorev = count(\backend\models\Articulo\Articulo::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $articulo = '<span class="badge badge-info right">'.$articulorev.'</span>';
    } else $articulo = '';

    $hechorev = count(\backend\models\Hecho\Hecho::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $hecho = '<span class="badge badge-info right">'.$hechorev.'</span>';
    } else $hecho = '';

    $cdrev = count(\backend\models\ColeccionDocumental\ColeccionDocumental::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $cd = '<span class="badge badge-info right">'.$cdrev.'</span>';
    } else $cd = '';

    $librorev = count(\backend\models\Libro\Libro::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $libro = '<span class="badge badge-info right">'.$librorev.'</span>';
    } else $libro = '';

    $corev = count(\backend\models\CursoOnline\CursoOnline::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $co = '<span class="badge badge-info right">'.$corev.'</span>';
    } else $co = '';

    $tallerrev = count(\backend\models\Taller\Taller::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $taller = '<span class="badge badge-info right">'.$tallerrev.'</span>';
    } else $taller = '';

    $exporev = count(\backend\models\Exposicion\Exposicion::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $expo = '<span class="badge badge-info right">'.$exporev.'</span>';
    } else $expo = '';

    $parev = count(\backend\models\ProductoAudiovisual\ProductoAudiovisual::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $pa = '<span class="badge badge-info right">'.$parev.'</span>';
    } else $pa = '';

    $otrosrev = count(\backend\models\Otros\Otros::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $otros = '<span class="badge badge-info right">'.$otrosrev.'</span>';
    } else $otros = '';

    $escritorev = count(\backend\models\Escrito\Escrito::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $escrito = '<span class="badge badge-info right">'.$escritorev.'</span>';
    } else $escrito = '';

    $testimoniorev = count(\backend\models\Testimonio\Testimonio::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $testimonio = '<span class="badge badge-info right">'.$testimoniorev.'</span>';
    } else $testimonio = '';

    $discursorev = count(\backend\models\Discurso\Discurso::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $discurso = '<span class="badge badge-info right">'.$discursorev.'</span>';
    } else $discurso = '';

    $correspondenciarev = count(\backend\models\Correspondencia\Correspondencia::find()->where(["revisado"=> 0])->all());
    if(Yii::$app->user->can('revisar')){
        $correspondencia = '<span class="badge badge-info right">'.$correspondenciarev.'</span>';
    } else $correspondencia = '';

    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
-->
        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php

            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [


                    ['label' => 'Archivos', 'url' => ['/archivo/index'], 'icon' => 'fas fa-file-upload' , 'visible' => Yii::$app->user->can('gestionar-archivo'), 'badge' => $archivo],
                    [
                        'label' => 'Inicio',
                        'icon' => 'fas fa-home',
                        'items' => [
                            ['label' => 'Actualidad', 'iconStyle' => 'far' , 'url' => ['/noticia/index'], 'visible' => Yii::$app->user->can('gestionar-noticia'), 'badge' => $actualidad],
                            ['label' => 'Carrusel', 'iconStyle' => 'far' , 'url' => ['/carrusel/index'], 'visible' => Yii::$app->user->can('gestionar-noticia')],
                            ['label' => 'Mapa', 'iconStyle' => 'far' , 'url' => "https://www.google.com/maps/d/edit?hl=es&mid=1UQQMw-m_DPTKOJPfYTs3ZkFBobP39SBE&ll=22.21037405686551%2C-80.85830277278139&z=8", 'visible' => Yii::$app->user->can('gestionar-noticia')],
                            ['label' => 'Paradigma', 'iconStyle' => 'far' , 'url' => ['/paradigma/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-noticia'), 'badge' => $revista],
                            ['label' => 'Quienes Somos', 'iconStyle' => 'far' , 'url' => ['/quienes/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-noticia')],
                            ['label' => 'Contacto', 'iconStyle' => 'far' , 'url' => ['/contacto/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-noticia')],
                            ['label' => 'Equipo de Trabajo', 'iconStyle' => 'far' , 'url' => ['/trabajador/index'], 'visible' => Yii::$app->user->can('gestionar-noticia')],

                        ]
                    ],

                    [
                        'label' => 'C. Académica',
                        'icon' => 'fa fa-brain',
                        'items' => [
                            ['label' => 'Líneas de Investigación', 'iconStyle' => 'far' , 'url' => ['/linea-investigacion/index'], 'visible' => Yii::$app->user->can('gestionar-linea-investigacion'), 'badge' => $lineas],
                            ['label' => 'Investigaciones', 'iconStyle' => 'far' , 'url' => ['/investigacion/index'], 'visible' => Yii::$app->user->can('gestionar-investigacion'), 'badge' => $investigacion],
                            ['label' => 'Artículos', 'iconStyle' => 'far' , 'url' => ['/articulo/index'], 'visible' => Yii::$app->user->can('gestionar-articulo'),'badge' => $articulo],
                            ['label' => 'Colección Documental', 'iconStyle' => 'far' , 'url' => ['/gestion-documental/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-coleccion-documental'),'badge' => $cd],
                            ['label' => 'Proyecto Editorial', 'iconStyle' => 'far' , 'url' => ['/proyecto/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-proyecto'),'badge' => $libro],
                            ['label' => 'Cursos Online', 'iconStyle' => 'far' , 'url' => ['/curso-online/index'], 'visible' => Yii::$app->user->can('gestionar-curso-online'),'badge' => $co],

                        ]
                    ],


                    [
                        'label' => 'Proyectos Alternativos',
                        'icon' => 'far fa-lightbulb',
                        'items' => [
                            ['label' => 'Proyectos Comunitarios', 'iconStyle' => 'far' , 'url' => ['/taller/index'], 'visible' => Yii::$app->user->can('gestionar-taller'),'badge' => $taller],
                            [
                                'label' => 'Programación Cultural',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Exposiciones', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/exposicion/index'], 'visible' => Yii::$app->user->can('gestionar-exposicion'),'badge' => $expo],
                                    ['label' => 'Productos Audiovisuales', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/producto-audiovisual/index'], 'visible' => Yii::$app->user->can('gestionar-producto-audiovisual'),'badge' => $pa],
                                    ['label' => 'Otros', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/otros/index'], 'visible' => Yii::$app->user->can('gestionar-exposicion'),'badge' => $otros],

                                ]
                            ],

                        ]
                    ],


                    [
                        'label' => 'Vida y Obra',
                        'icon' => 'fas fa-pen-nib',
                        'items' => [
                            ['label' => 'Cronología', 'iconStyle' => 'far' , 'url' => ['/hecho/index'], 'visible' => Yii::$app->user->can('gestionar-hecho'), 'badge' => $hecho],
                            ['label' => 'Correspondencias', 'iconStyle' => 'far' , 'url' => ['/correspondencia/index'], 'visible' => Yii::$app->user->can('gestionar-correspondencia'), 'badge' => $correspondencia],
                            ['label' => 'Escritos', 'iconStyle' => 'far' , 'url' => ['/escrito/index'], 'visible' => Yii::$app->user->can('gestionar-escrito'), 'badge' => $escrito],
                            ['label' => 'Discursos y Entrevistas', 'iconStyle' => 'far' , 'url' => ['/discurso/index'], 'visible' => Yii::$app->user->can('gestionar-discurso'), 'badge' => $discurso],
                            ['label' => 'Testimonios', 'iconStyle' => 'far' , 'url' => ['/testimonio/index'], 'visible' => Yii::$app->user->can('gestionar-testimonio'), 'badge' => $testimonio],
                            [
                                'label' => 'Galería',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Fotografía', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/galeria-v-o/index', 'tipo'=>1], 'visible' => Yii::$app->user->can('gestionar-galeriavo')],
                                    ['label' => 'Audio', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/galeria-v-o/index', 'tipo'=>2], 'visible' => Yii::$app->user->can('gestionar-galeriavo')],
                                    ['label' => 'Video', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/galeria-v-o/index', 'tipo'=>3], 'visible' => Yii::$app->user->can('gestionar-galeriavo')],
                                    ['label' => 'Homenajes', 'icon' => 'dot-circle', 'iconStyle' => 'far' , 'url' => ['/galeria-v-o/index', 'tipo'=>4], 'visible' => Yii::$app->user->can('gestionar-galeriavo')],
                                ]
                            ],

                        ]
                    ],


                    [
                        'label' => 'Administración',
                        'icon' => 'fas fa-cogs',
                        'visible' => Yii::$app->user->can('gestionar-usuarios'),
                        'items' => [
                            ['label' => 'Usuarios', 'iconStyle' => 'far' , 'url' => ['/user/index'], 'visible' => Yii::$app->user->can('gestionar-usuarios')],
                            ['label' => 'Roles', 'iconStyle' => 'far' , 'url' => ['/auth-item/index'], 'visible' => Yii::$app->user->can('gestionar-usuarios')],
                            ['label' => 'Géneros de Productos Audiovisuales', 'iconStyle' => 'far' , 'url' => ['/tipo-producto/index'], 'visible' => Yii::$app->user->can('gestionar-usuarios')],
                            ['label' => 'Tipos de Proyectos Comunitarios', 'iconStyle' => 'far' , 'url' => ['/tipo-taller/view', 'id'=>1], 'visible' => Yii::$app->user->can('gestionar-usuarios')],

                        ]
                    ],

                    ['label' => 'Comentarios', 'url' => ['/comentario/index'], 'icon' => 'far fa-comments' , 'visible' => Yii::$app->user->can('gestionar-comentario')],


                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>