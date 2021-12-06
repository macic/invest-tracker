<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio}}".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 *
 * @property Asset[] $assets
 * @property PortfolioStructure[] $portfolioStructures
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['name'], 'string', 'max' => 255],
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
            'user_id' => 'User ID'
        ];
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['portfolio_id' => 'id']);
    }

    /**
     * Gets query for [[PortfolioStructures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioStructure()
    {
        return $this->hasMany(PortfolioStructure::className(), ['portfolio_id' => 'id']);
    }

    public function getAssetTypeValue($asset_type_id)

    {
        $assets = $this->getAssets()->where(['asset_type_id'=>$asset_type_id])->all();
        $sum = 0;
        foreach ($assets as $asset) {
            $sum += $asset->buy_price*$asset->quantity;
        }
        return $sum;
        //$this->buy_price * $this->quantity . ' ' .$this->currency;
    }

}
