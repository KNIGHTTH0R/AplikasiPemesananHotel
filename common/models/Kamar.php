<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "KAMAR".
 *
 * @property double $ID_KAMAR
 * @property string $NAMA_KAMAR
 * @property string $TIPE_KAMAR
 * @property string $FASILITAS
 * @property string $KETERANGAN
 * @property string $GAMBAR
 *
 * @property HOTEL[] $hOTELs
 */
class Kamar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'KAMAR';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_KAMAR', 'TIPE_KAMAR', 'HOTEL_ID','HARGA','STOK_KAMAR','FASILITAS', 'KETERANGAN'], 'required'],
            [['NAMA_KAMAR', 'TIPE_KAMAR'], 'string', 'max' => 20],
            [['FASILITAS'], 'string', 'max' => 1000],
            [['KETERANGAN'], 'string', 'max' => 50],
            [['GAMBAR'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KAMAR' => 'ID Kamar',
            'NAMA_KAMAR' => 'Nama Kamar',
            'TIPE_KAMAR' => 'Tipe Kamar',
            'FASILITAS' => 'Fasilitas',
            'KETERANGAN' => 'Keterangan',
            'GAMBAR' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['ID_HOTEL' => 'HOTEL_ID']);
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['KAMAR_ID' => 'ID_KAMAR']);
    }
}
