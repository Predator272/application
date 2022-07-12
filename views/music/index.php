<?php

use yii\bootstrap4\Html;

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
	<?= Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']) ?>
    <div class="d-flex ml-3 w-75">Название/исполнитель</div>
    <div class="ml-4 d-flex p-3">
        <button type="button" class="btn btn-outline-success ml-4">Play</button>
        <button type="button" class="btn btn-outline-success ml-4">Поделиться</button>
	</div>

</div>