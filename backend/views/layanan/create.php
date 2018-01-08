<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Layanan */

$this->title = 'Buat Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="layanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
