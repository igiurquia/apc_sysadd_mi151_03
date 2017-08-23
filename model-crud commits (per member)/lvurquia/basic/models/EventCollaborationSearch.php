<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventCollaboration;

/**
 * EventCollaborationSearch represents the model behind the search form about `app\models\EventCollaboration`.
 */
class EventCollaborationSearch extends EventCollaboration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collaboration_id', 'attendee_id', 'event_id'], 'integer'],
            [['message', 'date', 'time'], 'safe'],
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
        $query = EventCollaboration::find();

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
            'collaboration_id' => $this->collaboration_id,
            'date' => $this->date,
            'attendee_id' => $this->attendee_id,
            'event_id' => $this->event_id,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'time', $this->time]);

        return $dataProvider;
    }
}
