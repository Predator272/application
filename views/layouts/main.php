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
            <?php 
                echo Html::a('Регистрация', 'site/signup/', $options = []);
                echo Html::a('Вход', 'site/signin/', $options = []);
                echo Html::a('Выход', '/ite/signout/', $options = []);
                echo Html::a('Профиль', 'user/view', $options = []);
            ?>
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