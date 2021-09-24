<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Account;

/**
 * This is the model class for table "{{%asset}}".
 *
 * @property int $id
 * @property int|null $account_id
 * @property string $type
 * @property string|null $name
 * @property string|null $ticker
 * @property float $buy_price
 * @property string|null $currency
 * @property float|null $last_price
 * @property int $quantity
 * @property int|null $buy_date
 *
 * @property Account $account
 */

define('asset_type', ['Stocks', 'ETF', 'Gold Units', 'Government Bonds', 'Cryptocurrency']);
define('currency', ['PLN', 'EUR', 'USD', 'GBP']);

class Asset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%asset}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'quantity'], 'integer'],
            [['buy_date'], 'date'],
            [['type', 'buy_price', 'quantity'], 'required'],
            [['buy_price', 'last_price'], 'number'],
            [['type', 'name', 'ticker', 'currency'], 'string', 'max' => 255],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'type' => 'Asset Type',
            'name' => 'Name',
            'ticker' => 'Ticker',
            'buy_price' => 'Buy Price',
            'currency' => 'Currency',
            'last_price' => 'Last Price',
            'quantity' => 'Quantity',
            'buy_date' => 'Buy Date',
        ];
    }

    /**
     * Gets query for [[Account]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AccountQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AssetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AssetQuery(get_called_class());
    }
}
