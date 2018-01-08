<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KeteranganLokasi;

/**
 * KeteranganLokasiSearch represents the model behind the search form of `common\models\KeteranganLokasi`.
 */
class KeteranganLokasiSearch extends KeteranganLokasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KETERANGAN','HOTEL_ID'], 'number'],
            [['NAMA_KETERANGAN','LAT', 'LNG'], 'safe'],
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
        $query = KeteranganLokasi::find();

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
            'ID_KETERANGAN' => $this->ID_KETERANGAN,
            'HOTEL_ID' => $this->HOTEL_ID,
        ]);

        $query->andFilterWhere(['like', 'NAMA_KETERANGAN', $this->NAMA_KETERANGAN])
            ->andFilterWhere(['like', 'LAT', $this->LAT])
            ->andFilterWhere(['like', 'LNG', $this->LNG]);

        return $dataProvider;
    }
}
