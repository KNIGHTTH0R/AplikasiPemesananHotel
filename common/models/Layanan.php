<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "LAYANAN".
 *
 * @property double $ID_LAYANAN
 * @property string $NAMA_LAYANAN
 */
class Layanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LAYANAN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_LAYANAN','HARGA'], 'required'],
            [['NAMA_LAYANAN'], 'string', 'max' => 150],
            [['GAMBAR'], 'file','maxSize' => 3000 * 3000 * 5, 'skipOnEmpty' => true, 'extensions' => ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', 'GIF'],'checkExtensionByMimeType'=>false,],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_LAYANAN' => 'ID Layanan',
            'NAMA_LAYANAN' => 'Nama Layanan',
            'HARGA' => 'Harga',
            'GAMBAR' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTambahlayanan()
    {
        return $this->hasMany(TambahLayanan::className(), ['LAYANAN_ID' => 'ID_LAYANAN']);
    }
}
