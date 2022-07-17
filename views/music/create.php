<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Поделиться</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
            // foreach ($user as $item) {
            //     echo $item->name;
            //     echo '</br>';
            // }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Отправить</button>
      </div>
    </div>
  </div>
</div>

<div class="d-flex">
    <?=  Html::a('Музыка', Url::toRoute('music/index', $schema = true), $options = ['class' => 'btn btn-outline-primary mb-3 mr-3'])?>
    <?=  Html::a('Моя музыка', Url::toRoute('music/mymusic', $schema = true), $options = ['class' => 'btn btn-outline-primary mb-3 mr-3'])?>
    <?=  Html::a('Добавить музыку', Url::toRoute('music/create', $schema = true), $options = ['class' => 'btn btn-outline-primary mb-3 mr-3'])?>
</div>

<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'data')->fileInput() ?>
	<div class="form-group">
		<?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
	</div>
<?php ActiveForm::end(); ?>