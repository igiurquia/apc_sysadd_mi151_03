<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Landmark;

/**
 * LandmarkSearch represents the model behind the search form about `app\models\Landmark`.
 */
class LandmarkSearch extends Landmark
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['landmark_name', 'landmark_address', 'landmark_distance_from_user'], 'safe'],
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
        $query = Landmark::find();

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
        ]);

        $query->andFilterWhere(['like', 'landmark_name', $this->landmark_name])
            ->andFilterWhere(['like', 'landmark_address', $this->landmark_address])
            ->andFilterWhere(['like', 'landmark_distance_from_user', $this->landmark_distance_from_user]);

        return $dataProvider;
    }
}
