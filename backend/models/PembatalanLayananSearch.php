<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PembatalanLayanan;

/**
 * PembatalanLayananSearch represents the model behind the search form of `common\models\PembatalanLayanan`.
 */
class PembatalanLayananSearch extends PembatalanLayanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PEMBATALAN', 'TAMBAHLAYANAN_ID'], 'number'],
            [['NO_KAMAR'], 'safe'],
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
        $query = PembatalanLayanan::find();

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
            'TAMBAHLAYANAN_ID' => $this->TAMBAHLAYANAN_ID,
            'NO_KAMAR' => $this->NO_KAMAR,
        ]);

        return $dataProvider;
    }
}
