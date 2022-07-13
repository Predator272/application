<?php

use yii\bootstrap4\Html;

$this->title = 'Главная';
?>

<!-- 
<div class="container-fluid">
<section style="position: relative; left:940px; top:100px; background:#dedede; width:120px;">
<div class="form-check pb-2" >

<form method="POST">

  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Популярное
  </label>
</div>
<div class="form-check pb-2">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Свежее
  </label>
</div>

<div class="form-check  pb-2">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Свежее
  </label>
</div>

<div class="form-check  pb-2">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Свежее
  </label>
</div>


</form>

</section> -->

<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="position: relative; bottom:0px; left:250px; max-width:600px;">




	/// бар

	<div id="list-example" class="list-group" style="max-width: 150px; position:relative; left:750px;">
		<?= Html::a('Музыка', ['/music/index'], ['class' => 'list-group-item list-group-item-action']) ?>
		<a class="list-group-item list-group-item-action" href="#list-item-1">Пункт 1</a>
		<a class="list-group-item list-group-item-action" href="#list-item-2">Пункт 2</a>
		<a class="list-group-item list-group-item-action" href="#list-item-3">Пункт 3</a>
		<a class="list-group-item list-group-item-action" href="#list-item-4">Пункт 4</a>
	</div>
	<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="position: relative; left:00px; bottom:200px; max-width:500px;">

		<div class="card" style="width: 501px;">

			<img class="card-img-top" src="" alt="Card image cap">
			<div class="card-body">
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
				<a href="#" class="btn btn-primary mt-1 ">оставить комментарий</a>
				<a href="#" class="btn btn-primary mt-1 " style="margin-left:57px">поставить лайк</a>

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