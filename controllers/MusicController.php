<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use app\models\User;
use app\models\Music;
use app\models\Mymusic;
use yii\web\UploadedFile;

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

    public function actionCreate(){


        $model = new Music();
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        

        if ($model->load($this->request->post()) && $file = UploadedFile::getInstance($model, 'data')) {
            $model->idUser = Yii::$app->user->identity->id;
            $model->executor = $user->name;
            $model->name = $file->name;
            $model->data = file_get_contents($file->tempName);
            if ($model->save()) {
                $music = Music::find()->all();
                $user = User::find()->all();
                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', 'Неудалось загрузить файл');
            }
        } else {
			$model->loadDefaultValues();
        }

        return $this->render('create', [
            'user' => $user,
            'model' => $model,
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
