<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<style type="text/css">
    .image {
        height: 20px;
        width: 20px;
    }
    .padding-bawah {
        padding-bottom: 20px;
    }
</style>

<div class="col-lg-3 padding-bawah">
<font size="2"><?= Html::img(Yii::getAlias('@imageurl')."/fasilitas/".$model->GAMBAR, ['class' => 'image']) ?> <?= Html::encode($model->NAMA_FASILITAS) ?></font>
</div>