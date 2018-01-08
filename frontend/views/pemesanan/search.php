<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = 'Cek Pesanan';
?>
<div class="pemesanan-index">

<div class="padding-center col-lg-9">
<div class="panel panel-default button-shadow">
<div class="panel-heading"><h4><center>Cek Pesanan</center></h4></div>
  <div class="panel-body">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
</div>