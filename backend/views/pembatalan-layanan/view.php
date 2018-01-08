<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PembatalanLayanan */

$this->title = $model->ID_PEMBATALAN;
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_PEMBATALAN], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PEMBATALAN',
            'TAMBAHLAYANAN_ID',
            'NO_KAMAR',
        ],
    ]) ?>

</div>
