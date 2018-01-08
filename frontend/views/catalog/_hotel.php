<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<style type="text/css">
    .image-new {
        height: 150px;
        width: 200px;
    }
    .padding-anyar {
        padding-top: 20px;
    }
</style>
<div class="col s6 m6">
<center>
<div class="thumbnail shadow">
    <div class="col-lg-5">
        <h4><?= Html::img(Yii::getAlias('@imageurl')."/hotel/".$model->GAMBAR, ['class' => 'image-new']) ?></h4>
    </div>
    <div class="padding-anyar">
    <p>
        <h5><b><?= Html::encode($model->NAMA_HOTEL) ?></b></h5>
        <h6>Start with : <b><font color"#FF0000"><?= Html::encode(Yii::$app->formatter->asCurrency($model->kamar->HARGA)) ?></font></b></h6>
        <div class="row">
                <p>
                <center>
                    <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Hotel' , ['catalog/view', 'id' => $model->ID_HOTEL], ['class' => 'btn btn-primary']);?>
                </center>
                </p>
        </div>
    </p>
    </div>
    </div>
    </center>
</div>