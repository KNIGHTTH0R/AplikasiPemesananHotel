<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FASILITAS_HOTEL".
 *
 * @property double $ID_FASILITAS
 * @property string $NAMA_FASILITAS
 * @property double $HOTEL_ID
 *
 * @property HOTEL $1
 */
class FasilitasHotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FASILITAS_HOTEL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_FASILITAS', 'HOTEL_ID'], 'required'],
            [['HOTEL_ID'], 'number'],
            [['NAMA_FASILITAS'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_FASILITAS' => 'Id  Fasilitas',
            'NAMA_FASILITAS' => 'Nama  Fasilitas',
            'HOTEL_ID' => 'Hotel  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['ID_HOTEL' => 'HOTEL_ID']);
    }
}
