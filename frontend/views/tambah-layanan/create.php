<?php

use yii\helpers\Html;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model common\models\TambahLayanan */

$this->title = 'Tambah Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Tambah Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tambah-layanan-create">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_layanan',
        'summary' => false,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
