<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
//
use app\models\EntryForm;
use app\models\Country;
use yii\data\Pagination;
//
use app\models\Course;
use app\models\Currency;
use app\models\Exchange;
use app\models\ExchangeCurrency;
use app\models\PlaypayForm;

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
    public function actionIndex($id = null)
    {
        if ($id != null) $arrayX = [1,2,3];
        else $arrayX = [4,5,6];

        return $this->render('index', $arrayX);
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
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

    /**
     * @param string $message
     * @return string
     */
    public function actionSay($message = "Hello")
    {
      return $this->render('say', ['message'=>$message]);
    }

    /**
     * Entry Form (Mik 28.06.18)
     *
     * @return string
     */
    public function actionEntry(){
        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model'=>$model]);
        } else {
            return $this->render('entry', ['model'=>$model]);
        }
    }

    /**
     * Entry Form (Mik 28.06.18)
     *
     * @return string
     */
    public function actionCountry($code = null, $pages = 5){
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => $pages,
            'totalCount' => $query->count(),
        ]);

        if ($code) $dbWere = ['code'=>$code];
        else $dbWere = [];

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where($dbWere)
            ->all();

        return $this->render('country', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays homepage.
     *
     *  $cE - current exchange
     *  $cC - current currency
     *
     * @return string
     */
    public function actionPlaypay($cE = null, $cC = null)
    {
        $model = new PlaypayForm();

        $course = Course::find()->asArray()->all();
        $currency = Currency::find()->asArray()->All();
        $exchange = Exchange::find()->asArray()->all();
        $exchangeCurrency = ExchangeCurrency::find()->asArray()->all();

        // поточний обмін
        if( !in_array($cE, ['1-2', '2-1']) ) $cE = '1-2';
        $cE = explode('-', $cE);

        // формуємо варіанти поточного обміну валют -  1)UAH, 2)USD,RUR
        $variantExchange = [];
        foreach ($cE as $e){
            if( empty($variantExchange[$e]) )$variantExchange[$e] = [];
            foreach ($exchangeCurrency as $ec){
                if ($e == $ec['exchangeId']){
                    foreach ($currency as $c){
                        if($ec['currencyId'] == $c['id']){ array_push($variantExchange[$e], $c['name']);}
                    }
                }
            }
        };

        // поточні валюти для обміну
        function makeC($cE, $variantExchange){
            $cC = [];
            foreach ($cE as $c)
                array_push($cC, $variantExchange[$c][0]);
            return $cC;
        };
        $cC = explode('-', $cC);
        if(count($cC) == 2 ) {
            $i = 0;
            foreach ($cE as $key => $e)
                if (in_array($cC[$key], $variantExchange[$e])) $i++;
            if ($i != 2) $cC = makeC($cE, $variantExchange);
        } else $cC = makeC($cE, $variantExchange);


        // курс валют приват24
        //$jsonurl = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
        //$json = trim(file_get_contents($jsonurl));
        //$course = json_decode($json, true);


        return $this->render('playpay', [
            'course' =>$course,
            'currency' => $currency,
            'exchange' => $exchange,
            'exchangeCurrency' => $exchangeCurrency,
            'cE' => $cE,
            'cC' => $cC,
            'variantExchange' => $variantExchange,
            'model' => $model,
        ]);
    }

    /**
     * @return string (Mik)
     *
     *
     */
    public function actionExchange(){

        return $this->render('exchange');
    }
}
