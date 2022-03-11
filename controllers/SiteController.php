<?php

namespace app\controllers;

use app\models\Account;
use app\models\AccountHolder;
use app\models\ForgotPasswordForm;
use app\models\SignupForm;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function init()
    {
        if (!Yii::$app->db->isActive) {
            Yii::error("No connection to Database.");
        }

        parent::init();
    }

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
                        'actions' => ['login', 'error', 'forgot-password', 'signup', 'gii', 'menu', 'welcome'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $this->layout = 'blank';

        $modelForm = new SignupForm();
        $postData = Yii::$app->request->post();

        if (count($postData)>0) {
            $accountHolder = $postData['SignupForm']['firstname'];
            unset($postData['SignupForm']['firstname']);
        }

        if ($modelForm->load($postData)) {
            $user_id = $modelForm->signup();
            if ($user_id) {
                $ac = new AccountHolder();
                $ac->user_id = $user_id;
                $ac->name = $accountHolder;
                if($ac->save()) {
                    return $this->redirect(Yii::$app->homeUrl);
                }
            }
        }
        
        return $this->render('signup', [
            'modelForm' => $modelForm,
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionWelcome()
    {

        $this->layout = 'new';

        return $this->render('welcome');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionForgotPassword()
    {
        $this->layout = 'blank';

        $model = new ForgotPasswordForm();
        {
            if ($model->load(Yii::$app->request->post()) && $model->ForgotPassword()) {
                return $this->refresh();
            }

            return $this->render('forgotPassword', [
                'model' => $model,
            ]);
        }
    }
}


