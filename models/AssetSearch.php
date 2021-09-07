<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\asset;

/**
 * AssetSearch represents the model behind the search form of `app\models\asset`.
 */
class AssetSearch extends asset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'quantity', 'buy_date'], 'integer'],
            [['name', 'ticker'], 'safe'],
            [['buy_price', 'last_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = asset::find();

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
            'id' => $this->id,
            'account_id' => $this->account_id,
            'buy_price' => $this->buy_price,
            'last_price' => $this->last_price,
            'quantity' => $this->quantity,
            'buy_date' => $this->buy_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ticker', $this->ticker]);

        return $dataProvider;
    }
}
