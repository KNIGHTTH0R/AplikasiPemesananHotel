<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransaksiPemesanan;

/**
 * TransaksiPemesananSearch represents the model behind the search form of `common\models\TransaksiPemesanan`.
 */
class TransaksiPemesananSearch extends TransaksiPemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TRANSAKSI_PESAN', 'PEMESANAN_ID'], 'number'],
            [['TANGGAL', 'KETERANGAN','STATUS'], 'safe'],
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
        $query = TransaksiPemesanan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_TRANSAKSI_PESAN' => $this->ID_TRANSAKSI_PESAN,
            'PEMESANAN_ID' => $this->PEMESANAN_ID,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL', $this->TANGGAL])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
