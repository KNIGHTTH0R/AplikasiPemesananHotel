<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PEMBATALAN_PEMESANAN".
 *
 * @property double $ID_PEMBATALAN
 * @property double $PEMESANAN_ID
 * @property double $NO_IDENTITAS
 */
class PembatalanPemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PEMBATALAN_PEMESANAN';
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
            [['PEMESANAN_ID', 'NO_IDENTITAS'], function($attribute, $params){
                $count = Yii::$app->db->createCommand('SELECT PEMBATALAN_PEMESANAN.PEMESANAN_ID, PEMBATALAN_PEMESANAN.NO_IDENTITAS FROM BANK.PEMBATALAN_PEMESANAN INNER JOIN GILANG.PEMESANAN ON :PEMESANAN_ID = PEMESANAN.ID_PEMESANAN AND :NO_IDENTITAS = PEMESANAN.NO_IDENTITAS')
                    ->bindValue(':PEMESANAN_ID', $this->PEMESANAN_ID)
                    ->bindValue(':NO_IDENTITAS', $this->NO_IDENTITAS)
                    ->queryScalar();

                if($count) {
                    \Yii::$app->getSession()->setFlash('success', 'Pemesanan Kamar Hotel dengan Kode '. $this->PEMESANAN_ID .' Telah Dibatalkan');
                    return true;
                } else {
                    \Yii::$app->getSession()->setFlash('error', 'Data Pemesanan Tidak Valid!.');
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
            'PEMESANAN_ID' => 'Kode Pemesanan',
            'NO_IDENTITAS' => 'No Identitas',
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
