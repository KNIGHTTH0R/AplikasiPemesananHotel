<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<style type="text/css">
    .image-size-view {
        height: 100px;
        width:100px;
    }
    .padding {
        padding: 10px;
    }
    .tinggi {
        height: 180px;
    }
</style>
<p>
<div class="thumbnail shadow col-lg-6 tinggi">
        <div class="col-lg-3">
            <h4><?= Html::img(Yii::getAlias('@imageurl')."/kamar/".$model->GAMBAR, ['class' => 'image-size-view']) ?></h4>
        </div>
        <p><div class="col-lg-5">
            <p><font size="2"><b><?= Html::encode($model->hotel->NAMA_HOTEL) . ' - ' . Html::encode($model->NAMA_KAMAR) ?></b></font></p>
            <p><font size="2"><?= Html::encode($model->hotel->ALAMAT_HOTEL) ?></font></p>
            <p><font size="2"><?= Yii::$app->formatter->asCurrency($model->HARGA) ?></font></p>
            <p><font size="2">Kamar yang tersedia :</font><font color="red" size="2"><?= Html::encode($model->STOK_KAMAR) ?></font></p>
        </div></p>
        <p><div class="col-lg-1">
            <center><?= Html::a('<span class="glyphicon glyphicon-ok-circle"></span> Pesan' , ['catalog/order', 'id' => $model->ID_KAMAR], ['class' => 'btn btn-danger']);?></center>
        </p></div>
</div>
</p>