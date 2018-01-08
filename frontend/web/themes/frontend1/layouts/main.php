<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html> 
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <title><?php echo Html::encode($this->title); ?></title>
  <?php $this->head(); ?>
	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
  <!-- CSS  -->
  <link href="<?php echo $this->theme->baseUrl ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>
<p><img src="uploads/1baru.jpg" width="1366px" height="150px" class="img-atas"></p>
  
  <?php $this->beginBody() ?>
    <div class="wrap">
      <?php
          NavBar::begin([
              'brandLabel' => Html::img('@web/uploads/1.png', ['width' => '100px']),
              'brandUrl' => Yii::$app->homeUrl,
              'options' => [
                  'class' => 'navbar navbar-fixed-top',
                  'role' => 'navigation',
              ],
          ]); 
        $menuItems = [
            ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['catalog/menu']],
            ['label' => '<span class="glyphicon glyphicon-map-marker"></span> Lokasi', 'url' => ['maps/index']],
            ['label' => '<span class="glyphicon glyphicon-search"></span> Cek Pesanan', 'url' => ['pemesanan/index']],
            ['label' => '<span class="glyphicon glyphicon-info-sign"></span> Tentang Kami', 'url' => ['site/about']],
            ['label' => '<span class="glyphicon glyphicon-tasks"></span> Bantuan', 'url' => ['site/bantuan']],
            //['label' => 'Login', 'url' => ['/site/login']],
        ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>
      </div>
    </div>

  <div class="padding-kanan-kiri">
        <div class="col s18 m18">
          <?php echo $content; ?>
        </div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/materialize.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/init.js"></script>
  
  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage(); ?>