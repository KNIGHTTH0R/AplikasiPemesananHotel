<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "KREDIT_LAYANAN".
 *
 * @property double $ID_KREDIT
 * @property double $KARTU_NO
 * @property string $NAMA_PEMILIK
 * @property string $TANGGAL_VALID
 * @property integer $CVV_NO
 * @property double $NOMINAL
 * @property double $KETERANGAN
 *
 * @property NASABAH $1
 * @property NASABAH $10
 * @property NASABAH $11
 * @property NASABAH $12
 */
class KreditLayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'KREDIT_LAYANAN';
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
            [['KARTU_NO', 'NAMA_PEMILIK', 'TANGGAL_VALID', 'CVV_NO', 'NOMINAL', 'KETERANGAN'], 'required'],
            [['NOMINAL', 'KETERANGAN'], 'number'],
            [['TANGGAL_VALID'], 'string'],
            [['CVV_NO'], 'integer'],
            [['NAMA_PEMILIK'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KREDIT' => 'Id  Kredit',
            'KARTU_NO' => 'Kartu  No',
            'NAMA_PEMILIK' => 'Nama  Pemilik',
            'TANGGAL_VALID' => 'Tanggal  Valid',
            'CVV_NO' => 'Cvv  No',
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
