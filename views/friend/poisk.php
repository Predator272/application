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
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <?php Pjax::end(); ?> 
    <?= Html::a('Вернуться', ['index'], ['class' => 'btn btn-success']) ?>
</div>