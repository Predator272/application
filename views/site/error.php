<?php

use yii\bootstrap4\Html;

$this->title = $name;
?>

<div class="alert alert-danger">
	<h3><?= Html::encode($this->title) ?></h3>
	<?= nl2br(Html::encode($message)) ?>
</div>