<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "KREDIT".
 *
 * @property double $ID_KREDIT
 * @property double $REKENING_NO
 * @property double $KARTU_NO
 * @property string $NAMA_PEMILIK
 * @property string $TANGGAL_VALID
 * @property double $NOMINAL
 * @property double $KETERANGAN
 *
 * @property NASABAH $1
 * @property NASABAH $10
 * @property NASABAH $11
 * @property NASABAH $12
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSFER';
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
            [['REKENING_NO', 'REKENING_TUJUAN', 'NOMINAL', 'KETERANGAN'], 'required'],
            [['REKENING_NO', 'NOMINAL', 'KETERANGAN','REKENING_TUJUAN','ID_TRANSFER'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANSFER' => 'ID Pembayaran',
            'REKENING_NO' => 'No Rekening Anda',
            'REKENING_TUJUAN' => 'No Rekening Tujuan',
            'NOMINAL' => 'Nominal Pembayaran',
            'KETERANGAN' => 'Keterangan',
        ];
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan()
    {
        return $this->hasOne(Pemesanan::className(), ['ID_PEMESANAN' => 'KETERANGAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabah()
    {
        return $this->hasOne(Nasabah::className(), ['NO_KARTU' => 'KARTU_NO']);
    }
}
