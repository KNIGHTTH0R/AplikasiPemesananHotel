<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PembatalanPemesanan */

$this->title = 'Pembatalan Pemesanan';
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-pemesanan-create">

    <center><h1><?= Html::encode($this->title) ?></h1></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
