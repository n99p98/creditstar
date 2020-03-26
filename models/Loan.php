<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property string $interest
 * @property string $duration
 * @property string $start_date
 * @property string $end_date
 * @property string $campaign
 * @property int $status
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['amount', 'interest', 'duration'], 'string', 'max' => 10],
            [['start_date', 'end_date'], 'string', 'max' => 20],
            [['campaign'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'amount' => 'Amount',
            'interest' => 'Interest',
            'duration' => 'Duration',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'campaign' => 'Campaign',
            'status' => 'Status',
        ];
    }
}
