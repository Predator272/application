<?php

use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <header>
        <?php NavBar::begin([
            'brandLabel' => Html::img(['/favicon.ico'], ['class' => 'mr-2', 'width' => '24']) . Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'linke navbar-expand-md fixed-top'],

        ]); ?>
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Вход', 'url' => ['/site/signin']],
                ['label' => 'Регистрация', 'url' => ['/site/signup']],
                [
                    'label' => 'Пользователь', 'items' => [
                        ['label' => 'Профиль', 'url' => ['/user/index']],
                        ['label' => 'Выход', 'url' => ['/site/signout']],
                    ],
                ],
            ],
        ]); ?>
        <?php NavBar::end(); ?>
        <div class="linke">
            <div class="fav">
                <svg width="200" height="200">

                    <circle class="bounce" cx="80" cy="55" r="15" fill="#e52e71" />
                    <rect x="65" y="80" width="28" height="50" fill="#ff8a00" />
                </svg>
            </div>
        </div>
        <style>
            .fav {
                position: relative;
                bottom: 110px;
            }

            .linke {
                position: relative;
                top: 50px;
                bottom: -20px;
                padding-bottom: 0px;
            }
        </style>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= $content ?>
        </div>
    </main>
    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; My Company <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>