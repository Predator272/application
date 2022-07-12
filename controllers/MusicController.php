<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use app\models\User;
use app\models\Music;

class MusicController extends Controller
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }else {
            $user = User::findOne(Yii::$app->user->identity->id);
            $model = Music::find()->where(['idUser' => $user->id])->all();
    
            return $this->render('index', [
                'model' => $model,
            ]);
        }
		
	}
}
