<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransferLayanan */

$this->title = $model->ID_TRANSFER;
$this->params['breadcrumbs'][] = ['label' => 'Transfer Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_TRANSFER',
            'REKENING_NO',
            'REKENING_TUJUAN',
            'NOMINAL',
            'KETERANGAN',
        ],
    ]) ?>

</div>
