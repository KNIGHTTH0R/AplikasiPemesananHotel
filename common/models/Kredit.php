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
class Kredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'KREDIT';
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
            [['KARTU_NO', 'NAMA_PEMILIK', 'TANGGAL_VALID', 'NOMINAL', 'KETERANGAN','CVV_NO'], 'required'],
            [['NOMINAL', 'KETERANGAN','CVV_NO'], 'number'],

            [['KARTU_NO','NAMA_PEMILIK', 'TANGGAL_VALID','CVV_NO'], function($attribute, $params){
                $count = Yii::$app->db->createCommand('SELECT KREDIT.KARTU_NO, KREDIT.NAMA_PEMILIK, KREDIT.TANGGAL_VALID, KREDIT.CVV_NO FROM BANK.KREDIT INNER JOIN BANK.NASABAH ON :KARTU_NO = NASABAH.NO_KARTU AND :NAMA_PEMILIK = NASABAH.NAMA AND :TANGGAL_VALID = NASABAH.TANGGAL_VALID AND :CVV_NO = NASABAH.CVV')
                    ->bindValue(':KARTU_NO', $this->KARTU_NO)
                    ->bindValue(':NAMA_PEMILIK', $this->NAMA_PEMILIK)
                    ->bindValue(':TANGGAL_VALID', $this->TANGGAL_VALID)
                    ->bindValue(':CVV_NO', $this->CVV_NO)
                    ->queryScalar();

                if($count) {
                    return true;
                } else {
                    $this->addError($attribute, 'Data Tidak Valid!.');
                }
            }],

            ['KETERANGAN', function($attribute, $params){
                $count = Yii::$app->db->createCommand('SELECT KETERANGAN FROM BANK.KREDIT WHERE KETERANGAN = :KETERANGAN')
                    ->bindValue(':KETERANGAN', $this->KETERANGAN)
                    ->queryScalar();

                if($count)
                    $this->addError($attribute, 'Kode Pemesanan ini telah dibayar.');
            }],

            [['TANGGAL_VALID'], 'string'],
            [['NAMA_PEMILIK'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KREDIT' => 'ID Pembayaran',
            'KARTU_NO' => 'No Kartu',
            'NAMA_PEMILIK' => 'Nama Pemilik',
            'TANGGAL_VALID' => 'Tanggal Kadaluarsa Kartu',
            'CVV_NO' => 'CVV',
            'NOMINAL' => 'Nominal',
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
    public function getNasabahkartu()
    {
        return $this->hasOne(Nasabah::className(), ['NO_KARTU' => 'KARTU_NO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabahnama()
    {
        return $this->hasOne(Nasabah::className(), ['NAMA' => 'NAMA_PEMILIK']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNasabahtanggal()
    {
        return $this->hasOne(Nasabah::className(), ['TANGGAL_VALID' => 'TANGGAL_VALID']);
    }
}
