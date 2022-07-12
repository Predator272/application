<?php

use yii\bootstrap4\Html;

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
            foreach ($user as $item) {
                echo $item->name;
                echo '</br>';
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Отправить</button>
      </div>
    </div>
  </div>
</div>


<?php 
    foreach ($model as $music) {
        echo '
        <div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
            '.Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']).'
            <div class="d-flex ml-3 w-75">'.$music->name.' / '.$music->executor.'</div>
            <div class="ml-4 d-flex p-3">
                <button type="button" class="btn btn-outline-success ml-4">▶</button>
                <button type="button" class="btn btn-outline-success ml-4" data-toggle="modal" data-target="#exampleModalLong">Поделиться</button>
	        </div>
        </div>
        ';
    }
?>

