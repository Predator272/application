<?php

use app\models\Friend;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FriendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Friends';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Искать друзей', ['search'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Искать пользователей', ['/user/userSearch'], ['class' => 'btn btn-success']) ?>
   
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
 if ($models){
    foreach ($models as $friend) {
      $frends = Friend::find()->where(['id' => $friend->idUser])->one();
      echo '
      <div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
          '.Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']).'
          <div class="d-flex ml-3 w-75">'.$friend->id.' / '.$friend->id.'</div>
          <div class="ml-4 d-flex p-3">
              <button type="button" class="btn btn-outline-success ml-4">удалить</button>
              
      </div>
      ';
    }
  }else {
    echo 'У вас нету друзей';
  }
?>
</div>
