<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="border rounded bg-white px-3 pt-3 mb-3">
	<h3><?= Html::encode($this->title) ?></h3>

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'rememberMe')->checkbox() ?>
	<div class="form-group">
		<?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>