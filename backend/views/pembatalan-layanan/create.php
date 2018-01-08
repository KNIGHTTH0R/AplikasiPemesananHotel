<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PembatalanLayanan */

$this->title = 'Create Pembatalan Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Pembatalan Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembatalan-layanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
