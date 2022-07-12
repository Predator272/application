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

	public function actionIndex()
	{
		$model = User::findOne(Yii::$app->user->identity->id);

		$file = new File();

		if ($this->request->isPost) {
			if ($file->load($this->request->post()) && $file->save()) {
				Yii::$app->session->setFlash('success', 'Файл успешно загружен');
			} else {
				Yii::$app->session->setFlash('error', 'Неудалось загрузить файл');
			}
		} else {
			$file->loadDefaultValues();
		}

		return $this->render('index', ['model' => $model, 'file' => $file]);
	}
}
