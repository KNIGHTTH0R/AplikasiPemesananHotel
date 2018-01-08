<?php
namespace backend\controllers;

use Yii;
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
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'ruleConfig' => [
                            'class' => \common\models\AccessRules::className(),
                        ],
                        'only' => ['logout','login','index','update','view','delete','create','signup'],
                        'rules' => [
                            // allow authenticated users
                        [
                            'actions' => ['login', 'signup'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['index','logout','update','view','delete','create','signup'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => [''],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                            // everything else is denied
                        ],
                    ],
        ];
    }

    public $successUrl = ''; //bikin variabel successUrl

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
                'successUrl' => $this->successUrl
            ],
        ];
    }

    public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        // user login or signup comes here

        // user login or signup comes here
        /*
        Kalo di die(print_r($attributes));
        maka akan keluar
        Array ( [id] => https://www.google.com/accounts/o8/id?id=AItOawkSN3ecyrQAUOVyy9kuX-2oq-hahagake [namePerson/first] => Hafid [namePerson/last] => Mukhlasin [pref/language] => en [contact/email] => milisstudio@gmail.com [first_name] => Hafid [last_name] => Mukhlasin [email] => milisstudio@gmail.com [language] => en ) 
     
        Nah data ini bisa kita gunakan untuk check apakah si user udah terdaftar ato belum..
        */

        $email = isset($attributes['email']) ? $attributes['email'] : 'gilangromadhanutartila99@gmail.com';
     
        $user = \common\models\Users::find()
            ->where([
                'EMAIL' => $email,
            ])
            ->one();
        if(!empty($user)){
            Yii::$app->user->login($user);
        }
        else{
            Yii::$app->session->setFlash('danger', "Email anda tidak terdaftar!!");
        } 
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
     
        $model = new SignupForm();
     
        // Tambahkan ini aje.. session yang kita buat sebelumnya, MULAI
        $session = Yii::$app->session;
        if (!empty($session['attributes'])){
            $model->USERNAME = $session['attributes']['first_name'];
            $model->EMAIL = $session['attributes']['email'];
        }
        // SELESAI
     
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
     
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
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
}
