<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = 'Edit Kamar: ' . $model->NAMA_KAMAR;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAMA_KAMAR, 'url' => ['view', 'id' => $model->ID_KAMAR]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="kamar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
