<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FasilitasHotel;

/**
 * FasilitasHotelSearch represents the model behind the search form of `common\models\FasilitasHotel`.
 */
class FasilitasHotelSearch extends FasilitasHotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_FASILITAS', 'HOTEL_ID'], 'number'],
            [['NAMA_FASILITAS'], 'safe'],
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
        $query = FasilitasHotel::find();

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
            'ID_FASILITAS' => $this->ID_FASILITAS,
            'HOTEL_ID' => $this->HOTEL_ID,
        ]);

        $query->andFilterWhere(['like', 'NAMA_FASILITAS', $this->NAMA_FASILITAS]);

        return $dataProvider;
    }
}
