<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotel;
use common\models\KeteranganLokasi;

/**
 * HotelSearch represents the model behind the search form of `common\models\Hotel`.
 */
class HotelBaruSearch extends Hotel
{
    public $GLOBALSEARCH;
    public $NAMA_WILAYAH;
    public $NAMA_KETERANGAN;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_HOTEL'], 'number'],
            [['NAMA_HOTEL', 'GLOBALSEARCH', 'NAMA_KETERANGAN' , 'NAMA_WILAYAH','LAT', 'LNG'], 'safe'],
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
        $query = Hotel::find()->joinWith('wilayah');
        $query->innerJoinWith('keteranganLokasi');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['NAMA_WILAYAH'] = [
            'asc' => ['WILAYAH.NAMA_WILAYAH' => SORT_ASC],
            'desc' => ['WILAYAH.NAMA_WILAYAH' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['NAMA_KETERANGAN'] = [
            'asc' => ['KETERANGAN_LOKASI.NAMA_KETERANGAN' => SORT_ASC],
            'desc' => ['KETERANGAN_LOKASI.NAMA_KETERANGAN' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        $query->orFilterWhere(['like', 'NAMA_HOTEL', $this->GLOBALSEARCH])
            ->orFilterWhere(['like', 'KETERANGAN_LOKASI.NAMA_KETERANGAN', $this->GLOBALSEARCH])
            ->orFilterWhere(['like', 'WILAYAH.NAMA_WILAYAH', $this->GLOBALSEARCH]);

        return $dataProvider;
    }
}
