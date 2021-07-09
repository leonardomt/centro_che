<?php
use \backend\models\User\User;
/* @var $this yii\web\View */

$this->title = 'Centro Che';
$usuarios = User::find()->all();
$articulos = \backend\models\Articulo\Articulo::find()->all();
$coleccionDoc = \backend\models\ColeccionDocumental\ColeccionDocumental::find()->all();
$cursoOnline = \backend\models\CursoOnline\CursoOnline::find()->all();
$expociciones = \backend\models\Exposicion\Exposicion::find()->all();
$homenajes = \backend\models\Homenaje\Homenaje::find()->all();
$investigacion = \backend\models\Investigacion\Investigacion::find()->all();
$talleres = \backend\models\Taller\Taller::find()->all();

$i=0; $j=0; $k=0; ; $m=0; $n=0; $p=0; $q=0; $r=0;

foreach ($usuarios as $users){$i++;};
foreach ($articulos as $articulo){$j++;};
foreach ($coleccionDoc as $coleccciones){$k++;};
foreach ($cursoOnline as $cursos){$m++;};
foreach ($expociciones as $expos){$n++;};
foreach ($homenajes as $homenaje){$p++;};
foreach ($investigacion as $investigations){$q++;};
foreach ($talleres as $taller){$r++;};
?>

<div id="main-wrapper">
    <div class="stadistic row">
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats" >
                        <p class="counter"><?php echo $i ?></p>
                        <span class="info-box-title">Usuarios</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-users"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?php echo $j ?></p>
                        <span class="info-box-title">Artículos</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-book-open"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"> <?php echo $r ?></p>
                        <span class="info-box-title">Talleres</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-notebook"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?php echo $q ?></p>
                        <span class="info-box-title">Investigaciones</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-bulb"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stadistic row">
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats" >
                        <p class="counter"><?php echo $k ?></p>
                        <span class="info-box-title">Colección Documental</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-folder"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?php echo $p ?></p>
                        <span class="info-box-title">Homenajes</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-heart"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"> <?php echo $m ?></p>
                        <span class="info-box-title">Cursos Online</span>
                    </div>
                    <div class="info-box-icon">
                        <i class=" icon-globe"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?php echo $n ?></p>
                        <span class="info-box-title">Exposiciones</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-camera"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


