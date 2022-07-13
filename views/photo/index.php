<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MultimediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Multimedia';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="multimedia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Multimedia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="position: relative; bottom:0px; left:250px; max-width:600px;">



  

<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="position: relative; left:00px; bottom:200px; max-width:500px;">
	

    
	
		
		</div>
	</div>
	

    <?php foreach ($photo as $item) { ?>
			<div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
				<?= $item->idUser ?>
				<div class="d-flex ml-3 w-75"><?= $item->name ?> <?= $item->time ?></div>
				<?= Html::img(['/photo', 'id' => $item->id], ['width' => '200']) ?>
			</div>
		<?php } ?>

		<h4 id="list-item-3"></h4>

		<?php foreach ($music as $item) { ?>
			<div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
				<?= $item->name ?>
				<div class="d-flex ml-3 w-75"><?= $item->name ?> <?= $item->executor ?></div>
			</div>
		<?php } ?>
  
</div>

</section>
</div>


</div>
