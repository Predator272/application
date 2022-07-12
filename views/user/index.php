<?php

use yii\helpers\Url;

$this->title = 'Профиль';
?>

<div class="site-profile">
    <div class="img">
        <img src="<?= Url::toRoute(['img/avatar.png']) ?>" alt="" class="placeholder" width="256" height="256">
    </div>
    <div class="info">
        <h1><?= $model->name ?></h1>
        <h6><strong>ID:</strong> <?= $model->id ?></h6>
        <label><strong>О себе:</strong></label>
        <div class="description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur consequatur cupiditate deserunt, error eum inventore maiores mollitia nesciunt possimus, quaerat, quidem quis ratione recusandae rem repellendus unde veritatis voluptatem!
        </div>
    </div>
</div>