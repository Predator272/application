<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-profile">
    <div class="img">
        <div class="placeholder">$avatar</div><!--потом заменить на авы через бд-->
    </div>
    <div class="info">
        <h4>$name</h4>
        <div class="description">
            <strong>ID:</strong> $id
        </div>
    </div>
</div>
<style>
    .placeholder{
        padding: 100px 85px;
        float: left;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 9999999px;
        background: #d9d9d9;
    }
    .info{
        float: right;
        padding-left: 35vw;
        background: #8e8e8e;
    }
</style>