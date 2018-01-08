<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "NASABAH".
 *
 * @property double $NO_REKENING
 * @property double $NO_KARTU
 * @property string $TANGGAL_VALID
 * @property string $NAMA
 * @property double $BANK_ID
 * @property double $SALDO
 *
 * @property BANK $1
 * @property KREDIT[] $kREDITs
 * @property KREDIT[] $kREDITs0
 * @property KREDIT[] $kREDITs1
 * @property KREDIT[] $kREDITs2
 */
class Nasabah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NASABAH';
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
            [['NO_REKENING', 'NO_KARTU', 'TANGGAL_VALID', 'NAMA', 'BANK_ID', 'SALDO','CVV'], 'required'],
            [['NO_REKENING', 'BANK_ID', 'SALDO','CVV'], 'number'],
            [['TANGGAL_VALID', 'STATUS'], 'string'],
            [['NAMA'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NO_REKENING' => 'No Rekening',
            'NO_KARTU' => 'No Kartu',
            'TANGGAL_VALID' => 'Tanggal Valid',
            'NAMA' => 'Nama',
            'CVV' => 'CVV',
            'BANK_ID' => 'Bank',
            'SALDO' => 'Saldo',
            'STATUS' => 'Status Kartu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['ID_BANK' => 'BANK_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKredit()
    {
        return $this->hasMany(Kredit::className(), ['REKENING_NO' => 'NO_REKENING']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKreditkartu()
    {
        return $this->hasMany(Kredit::className(), ['KARTU_NO' => 'NO_KARTU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKreditnama()
    {
        return $this->hasMany(Kredit::className(), ['NAMA_PEMILIK' => 'NAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKredittanggal()
    {
        return $this->hasMany(Kredit::className(), ['TANGGAL_VALID' => 'TANGGAL_VALID']);
    }
}
