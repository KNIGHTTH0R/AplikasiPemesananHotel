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
class TransaksiTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSAKSI_TRANSFER';
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
            [['REKENING_NO'], 'required'],
            [['REKENING_NO', 'KETERANGAN'], 'number'],
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
            'REKENING_NO' => 'No Rekening',
            'TANGGAL' => 'Tanggal',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
