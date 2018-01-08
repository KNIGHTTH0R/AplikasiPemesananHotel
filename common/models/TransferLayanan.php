<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "TRANSFER_LAYANAN".
 *
 * @property double $ID_TRANSFER
 * @property double $REKENING_NO
 * @property double $REKENING_TUJUAN
 * @property double $NOMINAL
 * @property double $KETERANGAN
 *
 * @property NASABAH $1
 * @property NASABAH $10
 */
class TransferLayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TRANSFER_LAYANAN';
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
            [['REKENING_NO', 'REKENING_TUJUAN', 'NOMINAL', 'KETERANGAN'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TRANSFER' => 'Id  Transfer',
            'REKENING_NO' => 'Rekening  No',
            'REKENING_TUJUAN' => 'Rekening  Tujuan',
            'NOMINAL' => 'Nominal',
            'KETERANGAN' => 'Keterangan',
        ];
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan()
    {
        return $this->hasOne(TambahLayanan::className(), ['ID_TAMBAHLAYANAN' => 'KETERANGAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabah()
    {
        return $this->hasOne(Nasabah::className(), ['NO_KARTU' => 'KARTU_NO']);
    }
}
