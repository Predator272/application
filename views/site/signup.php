<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Регистрация';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="block">
	<form action="<?= Url::toRoute(['site/signup']) ?>" method="post">
		<input type="text" name="User[name]" placeholder="Имя">
		<input type="text" name="User[email]" placeholder="Логин">
		<input type="password" name="User[password]" placeholder="Пароль">
		<input type="submit" value="Зарегестрироваться">
	</form>
</div>