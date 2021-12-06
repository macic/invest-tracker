<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property string $account_type
 * @property int|null $account_holder_id
 * @property string|null $broker
 * @property int|null $user_id
 *
 * @property AccountHolder $accountHolder
 * @property User $user
 * @property Asset[] $assets
 *
 */

define('account_type', ['IKE', 'IKZE', 'Government Bonds', 'Broker Account', 'Gold']);
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_type'], 'required'],
            [['account_holder_id', 'user_id'], 'integer'],
            [['account_type'], 'string', 'max' => 55],
            [['broker'], 'string', 'max' => 64],
            [['account_holder_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountHolder::className(), 'targetAttribute' => ['account_holder_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_type' => 'Account Type',
            'account_holder_id' => 'Account Holder ID',
            'broker' => 'Broker',
            'user_id' => 'User ID'
        ];
    }

    /**
     * Gets query for [[AccountHolder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountHolder()
    {
        return $this->hasOne(AccountHolder::className(), ['id' => 'account_holder_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['account_id' => 'id']);
    }

    public function getAccountName()
    {
        return $this->account_type .' - '.$this->accountHolder->name;
    }
}
