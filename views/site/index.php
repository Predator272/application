<?php

use yii\helpers\Html;

$this->title = 'Главная';
?>

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
</section>
</div>