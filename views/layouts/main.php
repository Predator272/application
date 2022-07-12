<?php

use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\bootstrap4\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>

	<header>
		<?php NavBar::begin([
			'brandLabel' => Html::img(['/favicon.ico'], ['class' => 'mr-2', 'width' => 24, 'height' => 24]) . Yii::$app->name,
			'brandUrl' => Yii::$app->homeUrl,
			'brandOptions' => ['class' => 'd-flex align-items-center'],
			'options' => ['class' => 'navbar navbar-expand-md navbar-light bg-white border-bottom'],
		]); ?>
		<?= Nav::widget([
			'options' => ['class' => 'navbar-nav ml-auto'],
			'items' => [
				['label' => 'Вход', 'url' => ['/site/signin'], 'visible' => Yii::$app->user->isGuest == true],
				['label' => 'Регистрация', 'url' => ['/site/signup'], 'visible' => Yii::$app->user->isGuest == true],
				[
					'label' => Yii::$app->user->isGuest == false ? Yii::$app->user->identity->name : 'Unknown',
					'items' => [
						['label' => 'Профиль', 'url' => ['/user/index']],
						['label' => 'Выход', 'url' => ['/site/signout']],
					],
					'visible' => Yii::$app->user->isGuest == false
				]
			]
		]) ?>
		<?php NavBar::end(); ?>
	</header>

	<main>
		<div class="container pt-3">
			<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'options' => ['class' => 'breadcrumb border bg-white']]) ?>
			<?= Alert::widget() ?>
			<?= $content ?>
		</div>
	</main>

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>