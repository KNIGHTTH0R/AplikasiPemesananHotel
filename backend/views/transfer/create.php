<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kredit */

$this->title = 'Pembayaran via ATM';
$this->params['breadcrumbs'][] = ['label' => 'Transfer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<center>
<div class="kredit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>