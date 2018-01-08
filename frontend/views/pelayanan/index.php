<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selamat Datang di Pelayanan Hotel';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	.padding-center-pemesanan {
	    padding-left: 160px;
	}
</style>
<div class="pemesanan-index">

    <center>
    <p><h5><b><?= Html::encode($this->title) ?></b></h5></p>
    <p><h6>Silahkan Tambah Layanan Anda Disini</h6></p>
    </center>
    
    <div class="container-fluid padding-center-pemesanan">
      <div class="row">
              <?= ListView::widget([
                  'dataProvider' => $dataProvider,
                  'itemView' => 'tampilpelayanan',
                  'summary' => false,
              ]) ?>
      </div>
    </div>
</div>
