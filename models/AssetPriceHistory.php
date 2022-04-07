<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset_price_history".
 *
 * @property int|null $id
 * @property int|null $asset_id
 * @property string|null $date
 * @property int|null $price
 *
 * @property Asset $asset
 */
class AssetPriceHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asset_price_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'asset_id', 'price'], 'integer'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asset::className(), 'targetAttribute' => ['asset_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asset_id' => 'Asset ID',
            'date' => 'Date',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Asset]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(Asset::className(), ['id' => 'asset_id']);
    }
}
