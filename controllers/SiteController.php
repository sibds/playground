<?php

namespace app\controllers;

use app\models\Nstable;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use slatiusa\nestable\Nestable;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
            'nodeMove' => [
                'class' => 'slatiusa\nestable\NodeMoveAction',
                'modelName' => Nstable::className(),
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNseditor()
    {
        $model = new Nstable();

        if(Yii::$app->request->isAjax){
            echo 'Ajax';
        }
        if(Yii::$app->request->isPjax){
            echo 'Pjax';
        }
        if (Yii::$app->request->isPost)
        {
            echo 'Post';
            $model = new Nstable();
            $model->load(Yii::$app->request->post());
            if($model->validate())
                $model->makeRoot();

            $model = new Nstable(); // reset model
        }

        return $this->render('nseditor', ['model'=>$model]);
    }

    public function actionTest(){
        $countries = new Nstable(['name' => 'Countries']);
        $countries->makeRoot();

        $russia = new Nstable(['name' => 'Russia']);
        $russia->prependTo($countries);

        $australia = new Nstable(['name' => 'Australia']);
        $australia->appendTo($countries);

        $newZeeland = new Nstable(['name' => 'New Zeeland']);
        $newZeeland->insertBefore($australia);

        $unitedStates = new Nstable(['name' => 'United States']);
        $unitedStates->insertAfter($australia);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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

    public function actionAbout()
    {
        return $this->render('about');
    }
}
