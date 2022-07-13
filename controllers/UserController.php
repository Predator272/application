<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use app\models\User;
use app\models\File;

class UserController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'denyCallback' => function ($rule, $action) {
					throw new ForbiddenHttpException('Вам не разрешено производить данное действие.');
				},
				'only' => ['index',],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	//Профиль
	public function actionIndex()
	{
		$model = User::findOne(Yii::$app->user->identity->id);
		return $this->render('index', ['model' => $model]);
	}

	//поиск юзера не доделан
	public function actionSearch(){
		$model = new User();
		$models = User::find()->all();
			$searchModel = new User();
			$dataProvider = $searchModel->search($this->request->queryParams);
	
			return $this->render('searchh');
	}
}
