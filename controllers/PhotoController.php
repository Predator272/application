<?php

namespace app\controllers;

use yii\web\Controller;

class PhotoController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
