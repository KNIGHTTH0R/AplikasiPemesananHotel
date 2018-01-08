<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FasilitasHotel */

$this->title = 'Buat Fasilitas Hotel';
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas Hotel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-hotel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
