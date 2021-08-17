<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property string $account_type
 * @property string $account_holder
 */
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
            [['account_type', 'account_holder'], 'required'],
            [['account_type'], 'string', 'max' => 55],
            [['account_holder'], 'string', 'max' => 99],
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
            'account_holder' => 'Account Holder',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AccountQuery(get_called_class());
    }
}