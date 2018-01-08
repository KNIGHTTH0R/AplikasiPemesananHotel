<?php

use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model common\models\TambahLayanan */

$this->title = 'Pembayaran via Kartu Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran via Kartu Kredit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
	.padding-baru {
		width: 500px;
	}
	.padding-center {
		padding-left: 500px;
	}
</style>
<center><h5><?= Html::encode($this->title) ?></h5></center>
<div class="col-lg-3"></div>
<div class="tambah-layanan-create col-lg-8 padding-baru padding-center">
    <?= $this->render('_bayarkredit', [
        'model' => $model,
    ]) ?>

</div>
