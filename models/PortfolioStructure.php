<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio_structure}}".
 *
 * @property int $id
 * @property int|null $portfolio_id
 * @property int|null $asset_type
 * @property int|null $percentage
 *
 * @property AssetType $assetType
 * @property Portfolio $portfolio
 */
class PortfolioStructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio_structure}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'asset_type', 'percentage'], 'integer'],
            [['asset_type'], 'exist', 'skipOnError' => true, 'targetClass' => AssetType::className(), 'targetAttribute' => ['asset_type' => 'id']],
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
            'portfolio_id' => 'Portfolio ID',
            'asset_type' => 'Asset Type',
            'percentage' => 'Percentage',
        ];
    }

    /**
     * Gets query for [[AssetType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssetType()
    {
        return $this->hasOne(AssetType::className(), ['id' => 'asset_type']);
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
}