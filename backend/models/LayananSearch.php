<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Layanan;

/**
 * LayananSearch represents the model behind the search form of `common\models\Layanan`.
 */
class LayananSearch extends Layanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_LAYANAN','HARGA'], 'number'],
            [['NAMA_LAYANAN','GAMBAR'], 'safe'],
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
        $query = Layanan::find();

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
            'ID_LAYANAN' => $this->ID_LAYANAN,
            'HARGA' => $this->HARGA,
        ]);

        $query->andFilterWhere(['like', 'NAMA_LAYANAN', $this->NAMA_LAYANAN])
        ->andFilterWhere(['like', 'GAMBAR', $this->GAMBAR]);

        return $dataProvider;
    }
}
