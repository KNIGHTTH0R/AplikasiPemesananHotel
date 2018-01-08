<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = $model->NAMA;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PEMESANAN',
            'KAMAR_ID',
            'TANGGAL_MASUK',
            'TANGGAL_PESAN',
            'TANGGAL_KELUAR',
            'JUMLAH_HARI',
            'JUMLAH_KAMAR',
            'NO_IDENTITAS',
            'NAMA',
            'ALAMAT',
            'NO_TELP',
            'EMAIL:email',
            'STATUS',
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/bukti/".$model->GAMBAR, ['width' => '300px']),
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
