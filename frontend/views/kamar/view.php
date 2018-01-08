<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = 'Orlando.com';
$this->params['breadcrumbs'][] = ['label' => 'Kamars', 'url' => ['index']];
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

    <h4><?= Html::encode($model->NAMA_KAMAR) ?></h4>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/kamar/".$model->GAMBAR, ['width' => '200px']),
                'format' => 'raw'
            ],
            'NAMA_KAMAR',
            'TIPE_KAMAR',
            'FASILITAS',
            'KETERANGAN',
        ],
    ]) ?>

</div>
</center>
