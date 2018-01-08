<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = $model->NAMA_LAYANAN;
$this->params['breadcrumbs'][] = ['label' => 'Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .padding-baru {
        padding: 30px;
    }
</style>
<p></p>
<center>
<div class="col-lg-3"></div>
<div class="kamar-view thumbnail col-lg-6 button-shadow padding-baru padding-center">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NAMA_LAYANAN',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->HARGA),
            ],
        ],
    ]) ?>

</div>
</center>
