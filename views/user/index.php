<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-profile">
    <div class="img">
        <img src="/img/avatar.png" alt="" class="placeholder" width="256" height="256">
    </div>
    <div class="info">
        <h4>$name</h4>
        <div class="description">
            <strong>ID:</strong> $id
        </div>
    </div>
</div>
<style>
    .placeholder {
        float: left;
        border-radius: 50%;
        border-radius: 9999999px;
        background: #d9d9d9;
    }

    .info {
        float: right;
        padding-left: 35vw;
        background: #8e8e8e;
    }
</style>