<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account_holder}}".
 *
 * @property int $id
 * @property string|null $name
 * @property int $user_id
 *
 * @property Account[] $accounts
 */
class AccountHolder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account_holder}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 99],
            [['name'], 'required'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Accounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['account_holder_id' => 'id']);
    }
}
