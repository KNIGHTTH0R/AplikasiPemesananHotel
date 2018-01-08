<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FasilitasHotel */

$this->title = $model->NAMA_FASILITAS;
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-hotel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_FASILITAS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Edit Gambar', ['updategambar', 'id' => $model->ID_FASILITAS], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_FASILITAS], [
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
            'ID_FASILITAS',
            'NAMA_FASILITAS',
            'HOTEL_ID',
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/fasilitas/".$model->GAMBAR, ['width' => '70px']),
                'format' => 'raw'
            ],
        ],
    ]) ?>

</div>
