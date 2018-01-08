<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransaksiTransfer;

/**
 * TransaksiSearch represents the model behind the search form of `common\models\Transaksi`.
 */
class TransaksiTransferSearch extends TransaksiTransfer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TRANSAKSI', 'REKENING_NO', 'KETERANGAN'], 'number'],
            [['TANGGAL'], 'safe'],
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
        $query = TransaksiTransfer::find();

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
            'ID_TRANSAKSI' => $this->ID_TRANSAKSI,
            'REKENING_NO' => $this->REKENING_NO,
            'KETERANGAN' => $this->KETERANGAN,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL', $this->TANGGAL]);

        return $dataProvider;
    }
}
