<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Friend */

$this->title = 'Create Friend';
$this->params['breadcrumbs'][] = ['label' => 'Friends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-create">
<?php 

    foreach ($models as $friend) {

    echo '
        <div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
            '.Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']).'
            <div class="d-flex ml-3 w-75">'.$friend->id.' / '.$friend->id.'</div>
            <div class="ml-4 d-flex p-3">
                <button type="button" class="btn btn-outline-success ml-4">▶</button>
                '.Html::a('+', ['music/mymusic', 'id' => $friend->id] ,$options = ['class' => 'btn btn-outline-success ml-4']).'
            </div>
        </div>
    ';
        
    }
?>
   
</div>
