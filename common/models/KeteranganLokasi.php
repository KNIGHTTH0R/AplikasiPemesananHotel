<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "KETERANGAN_LOKASI".
 *
 * @property double $ID_KETERANGAN
 * @property string $NAMA_KETERANGAN
 *
 * @property HOTEL[] $hOTELs
 */
class KeteranganLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'KETERANGAN_LOKASI';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LAT', 'LNG'], 'string', 'max' => 100],
            [['NAMA_KETERANGAN','HOTEL_ID'], 'required'],
            [['NAMA_KETERANGAN'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KETERANGAN' => 'ID Keterangan',
            'NAMA_KETERANGAN' => 'Nama Keterangan Lokasi',
            'HOTEL_ID' => 'Nama Hotel',
            'LAT' => 'Latitude',
            'LNG' => 'Longitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['HOTEL_ID' => 'ID_HOTEL']);
    }
}
