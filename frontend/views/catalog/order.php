<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .padding-atas {
        padding-top: 30px;
    }
</style>
<div class="pemesanan-create padding-atas">

    <p><h4><center><?= Html::img(Yii::getAlias('@imageurl')."/pesan.png", ['width' => '400px']) ?></center></h4></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="col-xs-1"></div>
<div class="container-fluid thumbnail col-lg-6 button-shadow">
    <p>
    <div class="row col-lg-5">
            <div class="col-xs-1"></div>
            <p><b><font size="3">Hotel</font></b></p>
            <div class="col-xs-1"></div>
            <p><b><font size="3">Alamat</font></b></p>
    		<div class="col-xs-1"></div>
            <p><b><font size="3">Harga</font></b></p>
            <div class="col-xs-1"></div>
            <p><b><font size="3">Gambar</font></b></p>
    </div>
    </p>
    <p>
    <div class="row col-lg-7">
            <p><font size="3"><?= Html::encode($order->hotel->NAMA_HOTEL . ' - ' . $order->NAMA_KAMAR) ?></font></p>
            <p><font size="3"><?= Html::encode($order->hotel->ALAMAT_HOTEL) ?></font></p>
            <p><font size="3"><?= Html::encode(Yii::$app->formatter->asCurrency($order->HARGA)) ?></font></p>
            <p><?= Html::img(Yii::getAlias('@imageurl')."/kamar/".$order->GAMBAR, ['width' => '270px']) ?></p>
    </div>
    </p>
</div>
