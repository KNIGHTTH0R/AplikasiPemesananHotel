<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "TRANSAKSI_PEMBATALAN".
 *
 * @property double $ID_TRANSAKSI_BATAL
 * @property double $PEMESANAN_ID
 * @property double $NO_IDENTITAS
 * @property string $TANGGAL_BATAL
 */
class TransaksiPembatalan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSAKSI_PEMBATALAN';
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
            [['PEMESANAN_ID', 'NO_IDENTITAS'], 'required'],
            [['PEMESANAN_ID', 'NO_IDENTITAS'], 'number'],
            [['TANGGAL_BATAL'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANSAKSI_BATAL' => 'Id  Transaksi  Batal',
            'PEMESANAN_ID' => 'Pemesanan  ID',
            'NO_IDENTITAS' => 'No  Identitas',
            'TANGGAL_BATAL' => 'Tanggal  Batal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::className(), ['ID_PEMESANAN' => 'PEMESANAN_ID']);
    }
}
