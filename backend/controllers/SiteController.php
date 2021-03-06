<?php
namespace backend\controllers;

use backend\models\Articulo\Articulo;
use backend\models\Correspondencia\Correspondencia;
use backend\models\Discurso\Discurso;
use backend\models\Escrito\Escrito;
use backend\models\Investigacion\Investigacion;
use backend\models\Noticia\Noticia;
use backend\models\Testimonio\Testimonio;
use backend\models\User\SignupForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['singup', 'error', 'request-password-reset', 'reset-password', 'login'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $x=0; $autores = [];
        $articulos = Articulo::find()->all(); 
        foreach ($articulos as $articulo){
            $autores[$x]= $articulo->autor;
            $x++;
        }
        $noticias = Noticia::find()->all();
        foreach ($noticias as $noticia){
            $autores[$x]= $noticia->autor;
            $x++;
        }
        $investigaciones = Investigacion::find()->all();
        foreach ($investigaciones as $investigacion){
            $autores[$x]= $investigacion->autor;
            $x++;
        }
        $correspondencias = Correspondencia::find()->all();
        foreach ($correspondencias as $correspondencia){
            $autores[$x]= $correspondencia->remitente;
            $x++;
        }

        $escritos = Escrito::find()->all();
        foreach ($escritos as $escrito){
            $autores[$x]= "Ernesto Che Guevara";
            $x++;
        }

        $discursos = Discurso::find()->all();
        foreach ($discursos as $discurso){
            $autores[$x]= "Ernesto Che Guevara";
            $x++;
        }
        
        $testimonios = Testimonio::find()->all();

        foreach ($testimonios as $testimonio){
            $autores[$x]= $testimonio->autor;
            $x++;
        }


        $values = array_count_values($autores);
        arsort($values);
        $escritores = array_slice($values, 0, 100, true);


        return $this->render('index', array("escritores"=>$values));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();

        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSingup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Usuario creado con ??xito');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }



    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = 10;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() ;

    }

}
