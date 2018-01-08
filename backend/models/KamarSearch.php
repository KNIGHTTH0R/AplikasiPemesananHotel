<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kamar;

/**
 * KamarSearch represents the model behind the search form of `common\models\Kamar`.
 */
class KamarSearch extends Kamar
{
    public $NAMA_HOTEL;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KAMAR','NAMA_HOTEL','HARGA','STOK_KAMAR',], 'number'],
            [['NAMA_KAMAR', 'TIPE_KAMAR', 'FASILITAS', 'KETERANGAN', 'GAMBAR'], 'safe'],
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
        $query = Kamar::find()->orderBy('HARGA');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['NAMA_HOTEL'] = [
            'asc' => ['hotel.NAMA_HOTEL' => SORT_ASC],
            'desc' => ['hotel.NAMA_HOTEL' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_KAMAR' => $this->ID_KAMAR,
            'NAMA_HOTEL' => $this->HOTEL_ID,
            'HARGA' => $this->HARGA,
            'STOK_KAMAR' => $this->STOK_KAMAR,
        ]);

        $query->andFilterWhere(['like', 'NAMA_KAMAR', $this->NAMA_KAMAR])
            ->andFilterWhere(['like', 'TIPE_KAMAR', $this->TIPE_KAMAR])
            ->andFilterWhere(['like', 'hotel.NAMA_HOTEL', $this->NAMA_HOTEL])
            ->andFilterWhere(['like', 'FASILITAS', $this->FASILITAS])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'GAMBAR', $this->GAMBAR]);

        return $dataProvider;
    }
}
