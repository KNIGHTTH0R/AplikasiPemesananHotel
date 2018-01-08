<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanPemesanan */

$this->title = $model->PEMESANAN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-pemesanan-view">

    <center><h1>Kode Pemesanan : <?= Html::encode($this->title) ?></h1></center>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_PEMBATALAN], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PEMBATALAN',
            'PEMESANAN_ID',
            'NO_IDENTITAS',
        ],
    ]) ?>

</div>
