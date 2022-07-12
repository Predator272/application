<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\User;
use app\models\Login;
use app\models\Multimedia;
use app\models\Music;

class SiteController extends Controller
{
	
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'denyCallback' => function ($rule, $action) {
					throw new ForbiddenHttpException('Вам не разрешено производить данное действие.');
				},
				'only' => ['signup', 'signin', 'signout',],
				'rules' => [
					[
						'actions' => ['signup', 'signin'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'actions' => ['signout'],
						'allow' => true,
						'roles' => ['@'],
					],
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
		];
	}

	//Главная страница
	public function actionIndex()
	{


		if (Yii::$app->user->isGuest) {
			return $this->redirect(['signup']);
        }else {
       
            $user = User::find()->where(['rule' => 0])->all();
            $model = Multimedia::find()->all();
			$models = Music::find()->all();
    
    
            return $this->render('index', [
				'user' => $user,
                'model' => $model,
				'models' => $models,
            ]);
        }

		$query = User::find();
		$dataProvider = new ActiveDataProvider(['query' => $query]);

		return $this->render('index', ['dataProvider' => $dataProvider]);

	}

	//Регистрация
	public function actionSignup()
	{
		$model = new User();

		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->save()) {
				Yii::$app->user->login($model, 3600 * 24 * 30);
				return $this->redirect(['user/index']);
			}
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('signup', ['model' => $model]);
	}

	//Вход
	public function actionSignin()
	{
		$model = new Login();

		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $model->login()) {
				return $this->goHome();
			}
		}

		$model->password = '';
		return $this->render('signin', ['model' => $model]);
	}

	//Выход
	public function actionSignout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
}
