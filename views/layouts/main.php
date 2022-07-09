<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <header>
        <div class="menu">
            <a href="<?= Yii::$app->homeUrl ?>"><img src="/favicon.ico" alt="" class="logo"><?= Yii::$app->name ?></a>
<<<<<<< HEAD
            <a href="/signup">Регистрация</a>
            <a href="/signin">Вход</a>
            <a href="/signout">Выход</a>
            <a href="/user/index">Профиль</a>
=======

        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
    </footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>