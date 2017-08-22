<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venue;

/**
 * VenueSearch represents the model behind the search form about `app\models\Venue`.
 */
class VenueSearch extends Venue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'venue_contact_num'], 'integer'],
            [['venue_name', 'venue_address', 'venue_desc'], 'safe'],
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
        $query = Venue::find();

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
            'venue_contact_num' => $this->venue_contact_num,
        ]);

        $query->andFilterWhere(['like', 'venue_name', $this->venue_name])
            ->andFilterWhere(['like', 'venue_address', $this->venue_address])
            ->andFilterWhere(['like', 'venue_desc', $this->venue_desc]);

        return $dataProvider;
    }
}
