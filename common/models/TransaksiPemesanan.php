<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "TRANSAKSI_PEMESANAN".
 *
 * @property double $ID_TRANSAKSI_PESAN
 * @property double $PEMESANAN_ID
 * @property string $TANGGAL
 * @property string $KETERANGAN
 *
 * @property PEMESANAN $1
 */
class TransaksiPemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSAKSI_PEMESANAN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PEMESANAN_ID'], 'required'],
            [['PEMESANAN_ID','NO_KAMAR'], 'number'],
            [['TANGGAL','STATUS'], 'string'],
            [['KETERANGAN'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANSAKSI_PESAN' => 'No Transaksi',
            'PEMESANAN_ID' => 'No Pemesanan',
            'TANGGAL' => 'Tanggal',
            'KETERANGAN' => 'Keterangan',
            'STATUS' => 'Status',
            'NO_KAMAR' => 'No Kamar'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::className(), ['ID_PEMESANAN' => 'PEMESANAN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTambahlayanan()
    {
        return $this->hasMany(TambahLayanan::className(), ['TRANSAKSI_ID' => 'PEMESANAN_ID']);
    }
}
