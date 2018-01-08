<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
$title = 'Orlando.com';
$this->title = Html::encode($title);
?>
<h5><center>Hasil pencarian</center></h5>

<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_hotel',
          ]) ?>
  </div>
</div>