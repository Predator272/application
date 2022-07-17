<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\FriendSearch */
/* @var $form yii\widgets\ActiveForm */
?>



<?php Pjax::begin(); ?> 
    
  
<?php 

foreach ($model as $friend) {

echo '
    <div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
        '.Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']).'
       
        <div class="d-flex ml-3 w-75">'.$friend->name.' / '.$friend->email.'</div>
        <div class="ml-4 d-flex p-3">
  
            '.Html::a('добавить', ['music/mymusic', 'id' => $friend->id] ,$options = ['class' => 'btn btn-outline-success ml-4']).'

        </div>
    </div>
';
    
}
?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
    ]); ?>


    <?php Pjax::end(); ?> 

</div>