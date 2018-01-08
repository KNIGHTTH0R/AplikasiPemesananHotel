<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nasabah */

$this->title = $model->NAMA;
?>
<div class="nasabah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NO_REKENING',
            'NO_KARTU',
            'TANGGAL_VALID',
            'NAMA',
            'CVV',
            [
                'label' => 'Bank',
                'value' => $model->bank->NAMA,
            ],
            [
                'label' => 'Saldo',
                'value' => $model->SALDO,
                'format' => 'Currency',
            ],
        ],
    ]) ?>

</div>
