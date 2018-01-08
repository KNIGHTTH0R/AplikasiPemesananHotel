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

<div class="col-lg-4 padding-bawah">
<font size="3"><b><?= Html::encode($model->NAMA_KETERANGAN) ?></b></font>
</div>