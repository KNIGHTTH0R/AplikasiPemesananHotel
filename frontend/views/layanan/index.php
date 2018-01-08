<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Layanan Hotel';
?>
<div class="layanan-index">

<div class="thumbnail shadow">

<center><h4><?= Html::encode($this->title) ?></h4></center>
<center><?= Html::a('Kembali', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?></center>

<div class="container-fluid">
  <div class="row">
          <?= ListView::widget([
              'dataProvider' => $dataProvider,
              'itemView' => '_layanan',
              'summary' => false,
          ]) ?>
  </div>
</div>
</div>
</div>
