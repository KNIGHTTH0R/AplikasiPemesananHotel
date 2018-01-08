<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Wilayah */

$this->title = 'Buat Wilayah';
$this->params['breadcrumbs'][] = ['label' => 'Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wilayah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
