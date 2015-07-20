<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form about `app\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['restaurant', 'Review', 'Price', 'web', 'Writer', 'VisitDate'], 'safe'],
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
        $query = Restaurant::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'VisitDate' => $this->VisitDate,
        ]);

        $query->andFilterWhere(['like', 'restaurant', $this->restaurant])
            ->andFilterWhere(['like', 'Review', $this->Review])
            ->andFilterWhere(['like', 'Price', $this->Price])
            ->andFilterWhere(['like', 'web', $this->web])
            ->andFilterWhere(['like', 'Writer', $this->Writer]);

        return $dataProvider;
    }
}
