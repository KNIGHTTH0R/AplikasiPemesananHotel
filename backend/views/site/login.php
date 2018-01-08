<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .padding-baru {
        padding: 30px;
    }
</style>
<center>
<div class="login-box img-thumbnail button-shadow padding-baru">

    <p><div class="login-logo">
        <p><center><?= Html::img(Yii::getAlias('@imageurl')."/Logo.png", ['width' => '150px'])?></center></p>
            <h3><b>Admin</b>Orlando.com</h3>
    </div></p>
            <?php if (Yii::$app->get("authClientCollection", false)): ?>
                        <div class="col-lg-offset-3">
                            <?= yii\authclient\widgets\AuthChoice::widget([
                                'baseAuthUrl' => ['site/auth']
                            ]) ?>
                        </div>
            <?php endif; ?>
      <div class="login-box-body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'USERNAME')->textInput(['class'=>'form-control', 'placeholder' => 'Username']);?>
          </div>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'PASSWORD')->passwordInput(['class'=>'form-control', 'placeholder' => 'Password']) ?>
          </div>
          <div class="row">   
              <div class="checkbox icheck">
                <label>
                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </label>                      
            </div>
            <p>
              <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary button-shadow', 'name' => 'login-button']) ?>
            </p>
          </div>
        </form>
      </div>
      <?php ActiveForm::end(); ?>
                   
    </div>
 </center>