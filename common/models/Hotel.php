<?php

namespace common\models;

use Yii;
use common\models\Pemesanan;
use common\models\KeteranganLokasi;
use common\models\Kamar;
use common\models\Wilayah;
use common\models\FasilitasHotel;

/**
 * This is the model class for table "HOTEL".
 *
 * @property double $ID_HOTEL
 * @property string $NAMA_HOTEL
 * @property string $ALAMAT_HOTEL
 * @property double $KAMAR_ID
 * @property double $KETERANGAN_ID
 * @property double $WILAYAH_ID
 * @property double $HARGA
 * @property string $LAT
 * @property string $LNG
 * @property string $KETERANGAN
 *
 * @property PEMESANAN[] $pEMESANANs
 * @property KAMAR $1
 * @property KETERANGANLOKASI $10
 * @property WILAYAH $11
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HOTEL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_HOTEL', 'ALAMAT_HOTEL', 'WILAYAH_ID', 'LAT', 'LNG', 'KETERANGAN'], 'required'],
            [['ID_HOTEL', 'WILAYAH_ID'], 'number'],
            [['NAMA_HOTEL'], 'string', 'max' => 30],
            [['ALAMAT_HOTEL'], 'string', 'max' => 255],
            [['LAT', 'LNG', 'KETERANGAN'], 'string', 'max' => 50],
            [['GAMBAR'], 'file','maxSize' => 3000 * 3000 * 5, 'skipOnEmpty' => true, 'extensions' => ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF'],'checkExtensionByMimeType'=>false,],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_HOTEL' => 'ID Hotel',
            'NAMA_HOTEL' => 'Nama Hotel',
            'ALAMAT_HOTEL' => 'Alamat Hotel',
            'WILAYAH_ID' => 'Nama Wilayah',
            'LAT' => 'Latitude',
            'LNG' => 'Longitude',
            'KETERANGAN' => 'Keterangan',
            'GAMBAR' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['HOTEL_ID' => 'ID_HOTEL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasMany(Kamar::className(), ['HOTEL_ID' => 'ID_HOTEL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKamar()
    {
        return $this->hasOne(Kamar::className(), ['HOTEL_ID' => 'ID_HOTEL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeteranganLokasi()
    {
        return $this->hasMany(KeteranganLokasi::className(), ['HOTEL_ID' => 'ID_HOTEL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::className(), ['ID_WILAYAH' => 'WILAYAH_ID']);
    }
}
