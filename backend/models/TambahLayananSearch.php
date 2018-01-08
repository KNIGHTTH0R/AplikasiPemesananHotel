<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TambahLayanan;

/**
 * TambahLayananSearch represents the model behind the search form of `common\models\TambahLayanan`.
 */
class TambahLayananSearch extends TambahLayanan
{
    public $ID_TRANSAKSI_PESAN;
    public $PEMESANAN_ID;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TAMBAHLAYANAN', 'PEMESANAN_ID', 'TRANSAKSI_ID', 'NAMA_LAYANAN', 'ID_TRANSAKSI_PESAN', 'JUMLAH_LAYANAN','NO_KAMAR','HARGA'], 'number'],
            [['TANGGAL', 'STATUS'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TambahLayanan::find()->joinWith('transaksi');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['ID_TRANSAKSI_PESAN'] = [
            'asc' => ['TRANSAKSI_PEMESANAN.ID_TRANSAKSI_PESAN' => SORT_ASC],
            'desc' => ['TRANSAKSI_PEMESANAN.ID_TRANSAKSI_PESAN' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['PEMESANAN_ID'] = [
            'asc' => ['TRANSAKSI_PEMESANAN.PEMESANAN_ID' => SORT_ASC],
            'desc' => ['TRANSAKSI_PEMESANAN.PEMESANAN_ID' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_TAMBAHLAYANAN' => $this->ID_TAMBAHLAYANAN,
            'TRANSAKSI_ID' => $this->TRANSAKSI_ID,
            'TRANSAKSI_PEMESANAN.PEMESANAN_ID' => $this->PEMESANAN_ID,
            'TRANSAKSI_PEMESANAN.ID_TRANSAKSI_PESAN' => $this->TRANSAKSI_ID,
            'JUMLAH_LAYANAN' => $this->JUMLAH_LAYANAN,
            'NO_KAMAR' => $this->NO_KAMAR,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL', $this->TANGGAL])
            ->andFilterWhere(['like', 'TRANSAKSI_PEMESANAN.PEMESANAN_ID', $this->PEMESANAN_ID])
            ->andFilterWhere(['like', 'TRANSAKSI_PEMESANAN.ID_TRANSAKSI_PESAN', $this->ID_TRANSAKSI_PESAN])
            ->andFilterWhere(['like', 'NAMA_LAYANAN', $this->NAMA_LAYANAN])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'HARGA', $this->HARGA]);

        return $dataProvider;
    }
}
