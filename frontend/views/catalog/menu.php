<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */

?>
<?= linchpinstudios\backstretch\Backstrech::widget([
                  // 'duration' => 2000,
                  //  'fade' => 750,
                    'clickEvent' => false,                    
                    'images' => [
                      ['image' => 'http://localhost/hotel/frontend/web/uploads/11.jpg'],
                      ['image' => 'http://localhost/hotel/frontend/web/uploads/12.jpg'],
                      ['image' => 'http://localhost/hotel/frontend/web/uploads/13.jpg'],
                    ],
                    'options' => [
				        'duration' => 2500,
				        //'fade' => 750,
				     ],
                  ]);
                ?>
<div class="container-fluid">
  <div class="row">
<p>
<center><?php echo $this->render('_search', ['model' => $searchModel]); ?></center>
</p>
  </div>
</div>