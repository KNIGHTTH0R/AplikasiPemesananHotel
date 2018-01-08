<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transfer;

/**
 * KreditSearch represents the model behind the search form of `common\models\Kredit`.
 */
class TransferSearch extends Transfer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TRANSFER', 'REKENING_NO', 'REKENING_TUJUAN','NOMINAL', 'KETERANGAN'], 'number'],
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
        $query = Transfer::find();

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
            'ID_TRANSFER' => $this->ID_TRANSFER,
            'REKENING_NO' => $this->REKENING_NO,
            'REKENING_TUJUAN' => $this->REKENING_TUJUAN,
            'KETERANGAN' => $this->KETERANGAN,
            'NOMINAL' => $this->NOMINAL,
        ]);

        return $dataProvider;
    }
}
