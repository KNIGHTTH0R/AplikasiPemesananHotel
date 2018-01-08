<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form of `common\models\Pemesanan`.
 */
class PemesananBatalSearch extends Pemesanan
{
    public $NAMA_KAMAR;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PEMESANAN', 'NO_IDENTITAS','JUMLAH_HARI', 'JUMLAH_KAMAR'], 'number'],
            [['TANGGAL_MASUK', 'TANGGAL_PESAN','TANGGAL_KELUAR', 'NAMA_KAMAR', 'NAMA', 'ALAMAT', 'NO_TELP', 'EMAIL', 'STATUS', 'GAMBAR'], 'safe'],
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
        $query = Pemesanan::find()->joinWith(['kamar'])->where(['STATUS' => 'Canceled']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['NAMA_KAMAR'] = [
            'asc' => ['kamar.NAMA_KAMAR' => SORT_ASC],
            'desc' => ['kamar.NAMA_KAMAR' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_PEMESANAN' => $this->ID_PEMESANAN,
            'NAMA_KAMAR' => $this->KAMAR_ID,
            'NO_IDENTITAS' => $this->NO_IDENTITAS,
            'JUMLAH_HARI' => $this->JUMLAH_HARI,
            'JUMLAH_KAMAR' => $this->JUMLAH_KAMAR,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL_MASUK', $this->TANGGAL_MASUK])
            ->andFilterWhere(['like', 'TANGGAL_PESAN', $this->TANGGAL_PESAN])
            ->andFilterWhere(['like', 'TANGGAL_KELUAR', $this->TANGGAL_KELUAR])
            ->andFilterWhere(['like', 'kamar.NAMA_KAMAR', $this->NAMA_KAMAR])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'NO_TELP', $this->NO_TELP])
            ->andFilterWhere(['like', 'GAMBAR', $this->GAMBAR])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
