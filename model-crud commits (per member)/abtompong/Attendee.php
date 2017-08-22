<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendee".
 *
 * @property integer $id
 * @property string $attendee_fname
 * @property string $attendee_Surname
 * @property string $attendee_password
 * @property string $attendee_email
 * @property string $attendee_birthdate
 * @property string $attendee_gender
 * @property string $attendee_contact_num
 * @property string $attendee_date_created
 * @property integer $employee_id
 *
 * @property Employee $employee
 * @property CollaborationSpaceHasAttendee[] $collaborationSpaceHasAttendees
 * @property EventCollaboration[] $eventCollaborations
 * @property Feedback[] $feedbacks
 * @property Newsfeed[] $newsfeeds
 */
class Attendee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attendee_fname', 'attendee_email', 'employee_id'], 'required'],
            [['employee_id'], 'integer'],
            [['attendee_fname', 'attendee_Surname', 'attendee_password', 'attendee_email', 'attendee_birthdate', 'attendee_gender', 'attendee_contact_num', 'attendee_date_created'], 'string', 'max' => 45],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attendee_fname' => 'Attendee Fname',
            'attendee_Surname' => 'Attendee  Surname',
            'attendee_password' => 'Attendee Password',
            'attendee_email' => 'Attendee Email',
            'attendee_birthdate' => 'Attendee Birthdate',
            'attendee_gender' => 'Attendee Gender',
            'attendee_contact_num' => 'Attendee Contact Num',
            'attendee_date_created' => 'Attendee Date Created',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollaborationSpaceHasAttendees()
    {
        return $this->hasMany(CollaborationSpaceHasAttendee::className(), ['attendee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventCollaborations()
    {
        return $this->hasMany(EventCollaboration::className(), ['attendee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['attendee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsfeeds()
    {
        return $this->hasMany(Newsfeed::className(), ['attendee_id' => 'id']);
    }
}
