<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use app\models\Music;

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

<div class="d-flex">
    <?=  Html::a('Музыка', Url::toRoute('music/index', $schema = true), $options = ['class' => 'btn btn-outline-primary mb-3 mr-3'])?>
    <?=  Html::a('Моя музыка', Url::toRoute('music/mymusic', $schema = true), $options = ['class' => 'btn btn-outline-primary mb-3 mr-3'])?>
</div>
<?php 
    if ($model){
      foreach ($model as $music) {
        $baba = Music::find()->where(['id' => $music->idMusic])->one();
        echo '
        <div class="border rounded bg-white mb-3 d-flex align-items-center justify-content-between">
            '.Html::img(['img/avatar.png'], ['class' => 'img-fluid rounded ml-3', 'width' => '50']).'
            <div class="d-flex ml-3 w-75">'.$baba->name.' / '.$baba->executor.'</div>
            <div class="ml-4 d-flex p-3">
                <button type="button" class="btn btn-outline-success ml-4">▶</button>
                '.Html::a('-', ['music/del', 'id' => $baba->id] ,$options = ['class' => 'btn btn-outline-success ml-4']).'
                <button type="button" class="btn btn-outline-success ml-4" data-toggle="modal" data-target="#exampleModalLong">Поделиться</button>
            </div>
        </div>
        ';
      }
    }else {
      echo 'У вас нету музыки';
    }
?>

