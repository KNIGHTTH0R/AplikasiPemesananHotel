<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "TRANSAKSI".
 *
 * @property double $ID_TRANSAKSI
 * @property double $REKENING_NO
 * @property string $TANGGAL
 * @property double $KETERANGAN
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSAKSI';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KARTU_NO'], 'required'],
            [['KARTU_NO', 'KETERANGAN'], 'number'],
            [['TANGGAL'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANSAKSI' => 'ID Transaksi',
            'KARTU_NO' => 'No Kartu',
            'TANGGAL' => 'Tanggal',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
