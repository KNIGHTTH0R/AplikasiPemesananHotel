<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<style type="text/css">
    .image-new {
        height: 250px;
        width: 200px;
    }
</style>
<div class="col-lg-4">
<center>
    <div class="thumbnail shadow">
        <h6><?= Html::img(Yii::getAlias('@imageurl')."/layanan/".$model->GAMBAR, ['class' => 'image-new']) ?></h6>
        <h6><b><?= Html::encode($model->NAMA_LAYANAN) ?></b></h6>
        <h6><b><?= Html::encode(Yii::$app->formatter->asCurrency($model->HARGA)) ?></b></h6></b>
    </div>
</center>
</div>