<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotel;

/**
 * HotelSearch represents the model behind the search form of `common\models\Hotel`.
 */
class HotelSearch extends Hotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_HOTEL'], 'number'],
            [['NAMA_HOTEL', 'WILAYAH_ID', 'ALAMAT_HOTEL', 'LAT', 'LNG', 'KETERANGAN', 'GAMBAR'], 'safe'],
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
        $query = Hotel::find()->orderBy('NAMA_HOTEL');

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
            'ID_HOTEL' => $this->ID_HOTEL,
            'WILAYAH_ID' => $this->WILAYAH_ID,
        ]);

        $query->andFilterWhere(['like', 'NAMA_HOTEL', $this->NAMA_HOTEL])
            ->andFilterWhere(['like', 'ALAMAT_HOTEL', $this->ALAMAT_HOTEL])
            ->andFilterWhere(['like', 'LAT', $this->LAT])
            ->andFilterWhere(['like', 'LNG', $this->LNG])
            ->andFilterWhere(['like', 'GAMBAR', $this->GAMBAR])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
