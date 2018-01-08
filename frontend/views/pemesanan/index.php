<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	.padding-center-pemesanan {
	    padding-top: 60px;
	    padding-left: 290px;
	}
</style>
<div class="pemesanan-index">

    <h4><center>Pesanan</center></h4>
    
    <div class="container-fluid padding-center-pemesanan">
      <div class="row">
              <?= ListView::widget([
                  'dataProvider' => $dataProvider,
                  'itemView' => '_pemesanan',
                  'summary' => false,
              ]) ?>
      </div>
    </div>
</div>
