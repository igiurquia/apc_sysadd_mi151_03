<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_collaboration".
 *
 * @property integer $collaboration_id
 * @property string $message
 * @property string $date
 * @property string $time
 * @property integer $attendee_id
 * @property integer $event_id
 *
 * @property Attendee $attendee
 * @property Event $event
 */
class EventCollaboration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_collaboration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collaboration_id', 'attendee_id', 'event_id'], 'required'],
            [['collaboration_id', 'attendee_id', 'event_id'], 'integer'],
            [['date'], 'safe'],
            [['message'], 'string', 'max' => 140],
            [['time'], 'string', 'max' => 45],
            [['attendee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attendee::className(), 'targetAttribute' => ['attendee_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'collaboration_id' => 'Collaboration ID',
            'message' => 'Message',
            'date' => 'Date',
            'time' => 'Time',
            'attendee_id' => 'Attendee ID',
            'event_id' => 'Event ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendee()
    {
        return $this->hasOne(Attendee::className(), ['id' => 'attendee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }
}
