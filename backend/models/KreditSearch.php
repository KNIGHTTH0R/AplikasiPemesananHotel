<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kredit;

/**
 * KreditSearch represents the model behind the search form of `common\models\Kredit`.
 */
class KreditSearch extends Kredit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KREDIT', 'KARTU_NO', 'NOMINAL', 'KETERANGAN','CVV_NO'], 'number'],
            [['NAMA_PEMILIK', 'TANGGAL_VALID'], 'safe'],
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
        $query = Kredit::find();

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
            'ID_KREDIT' => $this->ID_KREDIT,
            'KARTU_NO' => $this->KARTU_NO,
            'NOMINAL' => $this->NOMINAL,
            'KETERANGAN' => $this->KETERANGAN,
            'CVV_NO' => $this->CVV_NO,
        ]);

        $query->andFilterWhere(['like', 'NAMA_PEMILIK', $this->NAMA_PEMILIK])
            ->andFilterWhere(['like', 'TANGGAL_VALID', $this->TANGGAL_VALID]);

        return $dataProvider;
    }
}
