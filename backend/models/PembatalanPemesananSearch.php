<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PembatalanPemesanan;

/**
 * PembatalanPemesananSearch represents the model behind the search form of `common\models\PembatalanPemesanan`.
 */
class PembatalanPemesananSearch extends PembatalanPemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PEMBATALAN', 'PEMESANAN_ID', 'NO_IDENTITAS'], 'number'],
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
        $query = PembatalanPemesanan::find();

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
            'ID_PEMBATALAN' => $this->ID_PEMBATALAN,
            'PEMESANAN_ID' => $this->PEMESANAN_ID,
            'NO_IDENTITAS' => $this->NO_IDENTITAS,
        ]);

        return $dataProvider;
    }
}
