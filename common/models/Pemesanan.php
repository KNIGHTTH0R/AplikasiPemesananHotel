<?php

namespace common\models;

use Yii; 

/**
 * This is the model class for table "PEMESANAN".
 *
 * @property double $ID_PEMESANAN
 * @property double $HOTEL_ID
 * @property string $TANGGAL_MASUK
 * @property string $TANGGAL_KELUAR
 * @property double $NO_IDENTITAS
 * @property string $NAMA
 * @property string $ALAMAT
 * @property string $NO_TELP
 * @property string $EMAIL
 * @property string $STATUS
 * @property string $KETERANGAN
 *
 * @property TRANSAKSIPEMESANAN[] $tRANSAKSIPEMESANANs
 * @property HOTEL $1
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PEMESANAN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAMAR_ID', 'TANGGAL_MASUK', 'JUMLAH_HARI', 'JUMLAH_KAMAR', 'NO_IDENTITAS', 'NAMA', 'ALAMAT', 'NO_TELP', 'EMAIL'], 'required'],
            [['KAMAR_ID', 'NO_IDENTITAS','JUMLAH_HARI', 'JUMLAH_KAMAR','NO_TELP'], 'number'],
            [['TANGGAL_MASUK', 'TANGGAL_KELUAR', 'TANGGAL_PESAN'], 'string'],
            [['NAMA'], 'string', 'max' => 100],
            [['ALAMAT'], 'string', 'max' => 255],
            [['NO_TELP', 'STATUS'], 'string', 'max' => 20],
            [['EMAIL'], 'email'],
            [['GAMBAR'], 'file','maxSize' => 3000 * 3000 * 5, 'skipOnEmpty' => true, 'extensions' => ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF'],'checkExtensionByMimeType'=>false,],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PEMESANAN' => 'No Pesanan',
            'KAMAR_ID' => 'Nama Hotel',
            'TANGGAL_MASUK' => 'Check In',
            'JUMLAH_HARI' => 'Malam',
            'TANGGAL_KELUAR' => 'Check Out',
            'TANGGAL_PESAN' => 'Tanggal Pesan',
            'JUMLAH_KAMAR' => 'Jumlah Kamar',
            'NO_IDENTITAS' => 'No Identitas',
            'NAMA' => 'Nama',
            'ALAMAT' => 'Alamat',
            'NO_TELP' => 'No Telepon',
            'EMAIL' => 'Email',
            'STATUS' => 'Status',
            'GAMBAR' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPemesanan()
    {
        return $this->hasMany(TransaksiPemesanan::className(), ['PEMESANAN_ID' => 'ID_PEMESANAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKamar()
    {
        return $this->hasOne(Kamar::className(), ['ID_KAMAR' => 'KAMAR_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan()
    {
        return $this->hasMany(Kredit::className(), ['KETERANGAN_ID' => 'ID_PEMESANAN']);
    }

    /*public function afterSave($insert) {
        $this->TANGGAL_KELUAR = date('d-M-yy', time() + 30);
        return parent::afterSave($insert);
    }*/
}
