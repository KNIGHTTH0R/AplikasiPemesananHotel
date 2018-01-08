<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Admin <b>Orlando</b>com',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = 
        [
            'label' => 'Perhotelan',
            'items' => [
                ['label' => 'Wilayah', 'url' => ['/wilayah/index']],
                ['label' => 'Hotel', 'url' => ['/hotel/index']],
                ['label' => 'Keterangan Lokasi', 'url' => ['/keterangan-lokasi/index']],
                ['label' => 'Fasilitas Hotel', 'url' => ['/fasilitas-hotel/index']],
                ['label' => 'Kamar', 'url' => ['/kamar/index']],
            ],
        ];
        $menuItems[] = 
        [
            'label' => 'Pemesanan',
            'items' => [
                ['label' => 'Transaksi Detail', 'url' => ['/pemesanan/index']],
                ['label' => 'Info Pembayaran Pesanan', 'url' => ['/transaksi-pemesanan/index']],
            ],
        ];
        $menuItems[] = 
        [
            'label' => 'Pembatalan',
            'items' => [
                ['label' => 'Pembatalan Pemesanan', 'url' => ['/pembatalan-pemesanan/create']],
                ['label' => 'Data Pembatalan Pemesanan', 'url' => ['/pembatalan-pemesanan/index']],
                ['label' => 'Transaksi Pembatalan', 'url' => ['/transaksi-pembatalan/index']],
            ],
        ];
        $menuItems[] = 
        [
            'label' => 'Pelayanan Hotel',
            'items' => [
                ['label' => 'Layanan', 'url' => ['/layanan/index']],
                ['label' => 'Tambah Layanan', 'url' => ['/tambah-layanan/index']],
                ['label' => 'Input Nomor Kamar', 'url' => ['/transaksi-pemesanan/index']],
                ['label' => 'Pembatalan Tambah Layanan', 'url' => ['/pembatalan-layanan/create']],
            ],
        ];
        $menuItems[] =
        [
            'label' => 'Bank',
            'items' => [
                ['label' => 'Bank', 'url' => ['/bank/index']],
                ['label' => 'Nasabah', 'url' => ['/nasabah/index']],
                ['label' => 'Pembayaran ATM', 'url' => ['/transfer/index']],
                ['label' => 'Pembayaran Kredit', 'url' => ['/kredit/index']],
                ['label' => 'Pembayaran ATM Layanan', 'url' => ['/transfer-layanan/index']],
                ['label' => 'Pembayaran Kredit Layanan', 'url' => ['/kredit-layanan/index']],
                ['label' => 'Transaksi ATM', 'url' => ['/transaksi-transfer/index']],
                ['label' => 'Transaksi Kredit', 'url' => ['/transaksi/index']],
            ],
        ];

        $menuItems[] = ['label' => 'Pengguna', 'url' => ['/users/index']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->USERNAME . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <b>Orlando</b>com <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
