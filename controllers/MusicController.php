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
            $user = User::find()->where(['rule' => 0])->all();
            $model = Music::find()->all();
    
            return $this->render('index', [
                'user' => $user,
                'model' => $model,
            ]);
        }
	}

    public function actionMymusic()
	{
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }else {
            $user = User::find()->where(['rule' => 0])->all();
            $model = Music::find()->where(['idUser' => Yii::$app->user->id])->all();
    
            return $this->render('index', [
                'user' => $user,
                'model' => $model,
            ]);
        }
	}

    public function actionAdd(){
        $mymusic = Mymusic
    }
}
