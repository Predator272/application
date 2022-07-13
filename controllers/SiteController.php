<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Login;
use app\models\Photo;
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
				'only' => ['signup', 'signin', 'signout'],
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
		$photo = Photo::find()->all();
		$music = Music::find()->all();

		$model = new Photo();
		if ($this->request->isPost) {
			if ($model->load($this->request->post()) && $file = UploadedFile::getInstance($model, 'name')) {
				$model->idUser = Yii::$app->user->identity->id;
				$model->name = $file->name;
				$model->data = file_get_contents($file->tempName);
				if ($model->save()) {
					Yii::$app->session->setFlash('success', 'Файл успешно загружен');
				} else {
					Yii::$app->session->setFlash('error', 'Неудалось загрузить файл');
				}
			} else {
				Yii::$app->session->setFlash('error', 'Неудалось загрузить файл');
			}
			return $this->goHome();
		} else {
			$model->loadDefaultValues();
		}

		return $this->render('index', ['model' => $model, 'photo' => $photo, 'music' => $music]);
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

	//Получение фотографии
	public function actionPhoto($id)
	{
		$model = Photo::findOne($id);
		return $model->data;
	}

	//Получение музыки
	public function actionMusic($id)
	{
		$model = Music::findOne($id);
		return $model->data;
	}
}
