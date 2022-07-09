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
        <h1>$name</h1>
        <h6><strong>ID:</strong> $id</h6>
        <label><strong>О себе:</strong></label>
        <div class="description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur consequatur cupiditate deserunt, error eum inventore maiores mollitia nesciunt possimus, quaerat, quidem quis ratione recusandae rem repellendus unde veritatis voluptatem!
        </div>
    </div>
</div>