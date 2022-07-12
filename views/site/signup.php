<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="border rounded bg-white px-3 pt-3 mb-3">
	<h3><?= Html::encode($this->title) ?></h3>

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<div class="form-group">
		<?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-success']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>