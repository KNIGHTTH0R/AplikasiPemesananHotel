<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */

$this->title = $model->USERNAME;
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->ID_USER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->ID_USER], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_USER',
            'USERNAME',
            'PASSWORD',
            'EMAIL:email',
            'AUTH_KEY',
            [
             'attribute' => 'ROLE',
             'value' => (($model->ROLE == 0) ? "User": (($model->ROLE ==1)? "Administrator" : "Belum Terdaftar")),
            ],
        ],
    ]) ?>

</div>
