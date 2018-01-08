<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use kartik\tabs\TabsX;

$this->title = 'Orlando.com';
?>
<div class="site-about">
    <h4><center>Bantuan</center></h4>

    <!--<center>
    <div class="btn-group">
        <?= Html::a('Cara Pemesanan' , ['pemesanan'], ['class' => 'btn btn-primary']);?>
        <?= Html::a('Cara Pembayaran' , ['pembayaran'], ['class' => 'btn btn-primary']);?>
    </div>
    </center>-->

    <center>
    <?php echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Cara Pemesanan',
                'content' => Html::img(Yii::getAlias('@imageurl')."/bantuan/carapesan.png", ['width' => '700px']),
                'active' => true
            ],
            [
                'label' => 'Cara Pembayaran',
                'content' => TabsX::widget([
			        'position' => TabsX::POS_ABOVE,
			        'align' => TabsX::ALIGN_LEFT,
			        'items' => [
			            [
			                'label' => 'Kartu Kredit',
			                'content' => Html::img(Yii::getAlias('@imageurl')."/bantuan/carakredit.png", ['width' => '700px']),
			                'active' => true
			            ],
			            [
			                'label' => 'ATM',
			                'content' => Html::img(Yii::getAlias('@imageurl')."/bantuan/caraatm.png", ['width' => '700px']),
			            ],  
			        ],
			    ]),
            ], 
            [
                'label' => 'Cara Pembatalan',
                'content' => TabsX::widget([
                    'position' => TabsX::POS_ABOVE,
                    'align' => TabsX::ALIGN_LEFT,
                    'items' => [
                        [
                            'label' => 'Sebelum Bayar',
                            'content' => '<b><p align="left">Untuk melakukan pembatalan pemesanan sebelum melakukan pembayaran:</p></b>
                            <p align="left">1.Tunggulah hingga waktu yang diberikan untuk proses pembayaran habis</p>
                            <p align="left">2.Jika waktu habis maka secara otomatis pemesanan anda akan kadaluarsa</p>',
                            'active' => true
                        ],
                        [
                            'label' => 'Sesudah Bayar',
                            'content' => '<b><p align="left">Untuk melakukan pembatalan pemesanan setelah melakukan pembayaran:</p></b>
                            <p align="left">1.Hubungi admin web di nomor telepon 021 1234123</p>
                            <p align="left">2.Berikan data kode pemesanan dan no identitas untuk validasi pembatalan pemesanan</p>
                            <p align="left">3.Jika validasi berhasil maka proses pembatalan selesai dilakukan dan uang yang telah dibayar akan otomatis dikirim kembali dengan potongan 60% ke Orlando.com sebagai ganti rugi</p>',
                        ],  
                    ],
                ]),
            ], 
        ],
    ]);
    ?>
    </center>
</div>
