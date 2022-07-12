<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use app\models\User;
use app\models\Music;
use app\models\Mymusic;

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

    public function actionMymusic($id = 'Нет')
	{

        if($id == 'Нет'){
            
        }else {
            $mymusic = new Mymusic;
            $mymusic->idMusic = $id;
            $mymusic->idUser = Yii::$app->user->id;
            $mymusic->save();
        }
        $music = Mymusic::find()->where(['idUser' => Yii::$app->user->id])->all();
        $user = User::find()->where(['rule' => 0])->all();
        return $this->render('mymusic', [
            'user' => $user,
            'model' => $music,
        ]);


        
	}

    public function actionAdd($id){
        
        
        $user = User::find()->where(['rule' => 0])->all();


        return $this->render('index', [
            'user' => $user,
            'model' => $music,
        ]);
    }
    public function actionDel($id){
        echo 1;
    }
}
