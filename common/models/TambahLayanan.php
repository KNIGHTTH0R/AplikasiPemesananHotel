<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "TAMBAH_LAYANAN".
 *
 * @property double $ID_TAMBAHLAYANAN
 * @property string $TANGGAL
 * @property double $TRANSAKSI_ID
 * @property double $LAYANAN_ID
 * @property double $JUMLAH_LAYANAN
 * @property string $STATUS
 */
class TambahLayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TAMBAH_LAYANAN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TANGGAL'], 'string'],
            [['TRANSAKSI_ID', 'NAMA_LAYANAN', 'JUMLAH_LAYANAN','NO_KAMAR'], 'required'],
            [['TRANSAKSI_ID', 'JUMLAH_LAYANAN','NO_KAMAR','HARGA'], 'number'],
            [['STATUS'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TAMBAHLAYANAN' => 'ID Tambah Layanan',
            'TANGGAL' => 'Tanggal',
            'NO_KAMAR' => 'No Kamar',
            'TRANSAKSI_ID' => 'Kode Transaksi',
            'NAMA_LAYANAN' => 'Layanan',
            'JUMLAH_LAYANAN' => 'Jumlah Layanan',
            'STATUS' => 'Status',
            'HARGA' => 'Harga',
        ];
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayanan()
    {
        return $this->hasOne(Layanan::className(), ['NAMA_LAYANAN' => 'NAMA_LAYANAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(TransaksiPemesanan::className(), ['PEMESANAN_ID' => 'TRANSAKSI_ID']);
    }

    public function getLayananDropdown()
    {
            $listLayanan   = Layanan::find()->select('ID_LAYANAN','NAMA_LAYANAN')->all();
            $list   = ArrayHelper::map( $listLayanan,'ID_LAYANAN','NAMA_LAYANAN');

            return $list;
    }
}
