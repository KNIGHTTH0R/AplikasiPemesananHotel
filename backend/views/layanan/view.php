<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Layanan */

$this->title = $model->NAMA_LAYANAN;
$this->params['breadcrumbs'][] = ['label' => 'Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_LAYANAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Edit Gambar', ['updategambar', 'id' => $model->ID_LAYANAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_LAYANAN], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Gambar',
                'value' => Html::img(Yii::getAlias('@imageurl')."/layanan/".$model->GAMBAR, ['width' => '300px']),
                'format' => 'raw'
            ],
            'ID_LAYANAN',
            'NAMA_LAYANAN',
            [
                'label' => 'Harga',
                'value' => Yii::$app->formatter->asCurrency($model->HARGA),
            ],
        ],
    ]) ?>

</div>
