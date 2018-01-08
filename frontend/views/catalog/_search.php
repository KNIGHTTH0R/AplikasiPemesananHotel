<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\form\ActiveForm;
use common\models\Wilayah;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$title = 'Orlando.com';
$this->title = Html::encode($title);

/* @var $this yii\web\View */
/* @var $model frontend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
	    'action' => ['list'],
	    'method' => 'get',
	]); ?>
<div class="padding-center col-lg-9">
<div class="panel panel-default">
<div class="panel-heading"><h6><center>Cari hotel dengan mudah dan cepat disini!</center></h6></div>
  <div class="panel-body">

    	<?= $form->field($model, 'GLOBALSEARCH')->textInput(['placeholder' => 'Masukkan Nama Hotel, Wilayah, Tempat Menarik'])->label(false); ?>
 
	    <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Cari', ['class' => 'btn btn-primary']) ?>
	</div>
    <?php ActiveForm::end(); ?>
  </div>
</div>
