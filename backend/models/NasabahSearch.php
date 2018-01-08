<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Nasabah;

/**
 * NasabahSearch represents the model behind the search form of `common\models\Nasabah`.
 */
class NasabahSearch extends Nasabah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO_REKENING', 'NO_KARTU', 'BANK_ID', 'SALDO','CVV'], 'number'],
            [['TANGGAL_VALID', 'NAMA', 'STATUS'], 'safe'],
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
        $query = Nasabah::find();

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
            'NO_REKENING' => $this->NO_REKENING,
            'NO_KARTU' => $this->NO_KARTU,
            'BANK_ID' => $this->BANK_ID,
            'SALDO' => $this->SALDO,
            'CVV' => $this->CVV,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL_VALID', $this->TANGGAL_VALID])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA]);

        return $dataProvider;
    }
}
