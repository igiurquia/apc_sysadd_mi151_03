<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form about `app\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin_id'], 'integer'],
            [['conference_name', 'conference_speaker', 'conference_date', 'conference_time', 'conference_venue'], 'safe'],
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
        $query = Schedule::find();

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
            'conference_date' => $this->conference_date,
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'conference_name', $this->conference_name])
            ->andFilterWhere(['like', 'conference_speaker', $this->conference_speaker])
            ->andFilterWhere(['like', 'conference_time', $this->conference_time])
            ->andFilterWhere(['like', 'conference_venue', $this->conference_venue]);

        return $dataProvider;
    }
}
