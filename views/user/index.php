<?php

use yii\bootstrap4\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="border rounded bg-white p-3 mb-3 d-flex">
	<?= Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded', 'width' => '200']) ?>
	<div class="ml-4">
		<h3><?= Html::encode($this->title) ?></h3>
		<p class="mb-2"><strong>ID:</strong> <?= $model->id ?></p>
		<p class="mb-2"><strong>О себе:</strong>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur consequatur cupiditate deserunt, error eum inventore maiores mollitia nesciunt possimus, quaerat, quidem quis ratione recusandae rem repellendus unde veritatis voluptatem!
		</p>
	</div>
</div>