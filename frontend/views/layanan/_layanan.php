<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<style type="text/css">
    .image-new {
        height: 200px;
        width: 200px;
    }
    .padding-anyar {
        padding-top: 20px;
    }
</style>
<div class="col-lg-4">
<center>
    <div class="thumbnail shadow">
        <h4><?= Html::img(Yii::getAlias('@imageurl')."/layanan/".$model->GAMBAR, ['class' => 'image-new']) ?></h4>
        <h5><b><?= Html::encode($model->NAMA_LAYANAN) ?></b></h5>
        <h5><b><?= Html::encode(Yii::$app->formatter->asCurrency($model->HARGA)) ?></b></h5></b></h6></b></h6>
    </div>
</center>
</div>