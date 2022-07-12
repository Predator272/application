<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
foreach ($model->select('name')->column() as $item) {
?>
	<div class="border rounded bg-white p-3 mb-3">
		<?= $item ?>
	</div>
<?php
}
?>