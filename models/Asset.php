<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%asset}}".
 *
 * @property int $id
 * @property int|null $account_id
 * @property string|null $name
 * @property string|null $ticker
 * @property float $buy_price
 * @property string|null $currency
 * @property float|null $last_price
 * @property int $quantity
 * @property int|null $buy_date
 * @property int|null $portfolio_id
 * @property int|null $asset_type_id
 *
 * @property Account $account
 * @property AssetType $assetType
 * @property Portfolio $portfolio
 */
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
            [['account_id', 'quantity', 'portfolio_id', 'asset_type_id'], 'integer'],
            [['buy_date'], 'date', 'format' => 'php:Y-m-d'],
            [['buy_price', 'quantity'], 'required'],
            [['buy_price', 'last_price'], 'number'],
            [['name', 'ticker', 'currency'], 'string', 'max' => 255],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
            [['asset_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AssetType::className(), 'targetAttribute' => ['asset_type_id' => 'id']],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolio_id' => 'id']],
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
            'name' => 'Name',
            'ticker' => 'Ticker',
            'buy_price' => 'Buy Price',
            'currency' => 'Currency',
            'last_price' => 'Last Price',
            'quantity' => 'Quantity',
            'buy_date' => 'Buy Date',
            'portfolio_id' => 'Portfolio ID',
            'asset_type_id' => 'Asset Type',
        ];
    }

    /**
     * Gets query for [[Account]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }

    /**
     * Gets query for [[AssetType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssetType()
    {
        return $this->hasOne(AssetType::className(), ['id' => 'asset_type_id']);
    }

    /**
     * Gets query for [[Portfolio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }

    public function getType()
    {
        return $this->assetType->name;
    }
    public function getAccountName()
    {
        return $this->account->account_type .' - '.$this->account->account_holder;
    }
    public function getValue()
    {
        return $this->buy_price * $this->quantity . ' ' .$this->currency ;
    }
}
