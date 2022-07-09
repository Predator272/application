<?php

use yii\helpers\Html;

$this->title = $name;
?>

<div class="block">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= nl2br(Html::encode($message)) ?>
</div>

<style>
    .block {
        border: 1px solid gray;
        border-radius: 5px;
        padding: 15px;
    }
</style>