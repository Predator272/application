<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

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
			<a href="<?= Yii::$app->homeUrl ?>"><img src="<?= Url::toRoute(['/favicon.ico']) ?>" alt=""><?= Yii::$app->name ?></a>

			<?php if (Yii::$app->user->isGuest) { ?>
				<a href="<?= Url::toRoute(['site/signup']) ?>">Регистрация</a>
				<a href="<?= Url::toRoute(['site/signin']) ?>">Вход</a>
			<?php } else { ?>
				<a href="<?= Url::toRoute(['user/index']) ?>">Профиль</a>
				<a href="<?= Url::toRoute(['site/signout']) ?>">Выход</a>
			<?php } ?>
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