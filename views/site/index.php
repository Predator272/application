<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Главная';
?>


<div class="border rounded bg-white px-3 pt-3 mb-3">
	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'name')->fileInput(); ?>
	<div class="form-group">
		<?= Html::submitButton('Загрузить фотографию', ['class' => 'btn btn-success']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="position: relative; bottom:0px; left:250px; max-width:600px;">

	<div id="list-example" class="list-group" style="max-width: 150px; position:relative; right:250px;">
		<?= Html::a('Музыка', ['/music/index'], ['class' => 'list-group-item list-group-item-action']) ?>
		<?= Html::a('Друзья', ['/friend/index'], ['class' => 'list-group-item list-group-item-action']) ?>

<div class="d-flex">
	<div class="list-group mr-3" style="min-width: 300px">

		<?= Html::a('Профиль', ['/user/index'], ['class' => 'list-group-item list-group-item-action']) ?>
		<?= Html::a('Друзья', ['/user/index'], ['class' => 'list-group-item list-group-item-action']) ?>
		<?= Html::a('Сообщения', ['/user/index'], ['class' => 'list-group-item list-group-item-action']) ?>
		<?= Html::a('Музыка', ['/music/index'], ['class' => 'list-group-item list-group-item-action']) ?>
	</div>
	<div class="w-100">
		<div class="border rounded bg-white px-3 pt-3 mb-3">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($model, 'name')->fileInput(); ?>
			<div class="form-group">
				<?= Html::submitButton('Загрузить фотографию', ['class' => 'btn btn-success']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
		<?php foreach ($photo as $item) { ?>
			<div class="border rounded bg-white p-3 mb-3 d-flex">
				<?= Html::img(['/photo', 'id' => $item->id], ['class' => 'img-fluid img-thumbnail', 'width' => '400']) ?>
				<div class="ml-3"><?= $item->name ?> <?= $item->time ?></div>
			</div>
		<?php } ?>
	</div>
</div>