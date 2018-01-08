<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "WILAYAH".
 *
 * @property double $ID_WILAYAH
 * @property string $NAMA_WILAYAH
 *
 * @property HOTEL[] $hOTELs
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'WILAYAH';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_WILAYAH'], 'required'],
            [['ID_WILAYAH'], 'number'],
            [['NAMA_WILAYAH'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_WILAYAH' => 'ID Wilayah',
            'NAMA_WILAYAH' => 'Nama Wilayah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasMany(HOTEL::className(), ['WILAYAH_ID' => 'ID_WILAYAH']);
    }
}
