<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PEMBATALAN_LAYANAN".
 *
 * @property double $ID_PEMBATALAN
 * @property double $TAMBAHLAYANAN_ID
 * @property double $NO_IDENTITAS
 */
class PembatalanLayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PEMBATALAN_LAYANAN';
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
            [['TAMBAHLAYANAN_ID', 'NO_KAMAR'], 'required'],
            [['TAMBAHLAYANAN_ID', 'NO_KAMAR'], function($attribute, $params){
                $count = Yii::$app->db->createCommand('SELECT PEMBATALAN_LAYANAN.TAMBAHLAYANAN_ID, PEMBATALAN_LAYANAN.NO_KAMAR FROM BANK.PEMBATALAN_LAYANAN INNER JOIN GILANG.TAMBAH_LAYANAN ON :TAMBAHLAYANAN_ID = TAMBAH_LAYANAN.ID_TAMBAHLAYANAN AND :NO_KAMAR = TAMBAH_LAYANAN.NO_KAMAR')
                    ->bindValue(':TAMBAHLAYANAN_ID', $this->TAMBAHLAYANAN_ID)
                    ->bindValue(':NO_KAMAR', $this->NO_KAMAR)
                    ->queryScalar();

                if($count) {
                    \Yii::$app->getSession()->setFlash('success', 'Tambah Layanan dengan Kode '. $this->TAMBAHLAYANAN_ID .' Telah Dibatalkan');
                    return true;
                } else {
                    \Yii::$app->getSession()->setFlash('error', 'Data Tambah Layanan Tidak Valid!.');
                    $this->addError($attribute, 'Data Tidak Valid!.');
                }
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PEMBATALAN' => 'ID Pembatalan',
            'TAMBAHLAYANAN_ID' => 'ID Tambah Layanan',
            'NO_KAMAR' => 'Nomor Kamar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTambahlayanan()
    {
        return $this->hasOne(Tambahlayanan::className(), ['ID_TAMBAHLAYANAN' => 'TAMBAHLAYANAN_ID']);
    }
}
