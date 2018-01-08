<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = $model->NAMA_KAMAR;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kamar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_KAMAR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Edit Gambar', ['updategambar', 'id' => $model->ID_KAMAR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_KAMAR], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/kamar/".$model->GAMBAR, ['width' => '300px']),
                'format' => 'raw'
            ],
            'ID_KAMAR',
            'HOTEL_ID',
            'NAMA_KAMAR',
            'TIPE_KAMAR',
            'HARGA',
            'STOK_KAMAR',
            'FASILITAS',
            'KETERANGAN',
        ],
    ]) ?>

</div>
