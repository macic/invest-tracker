<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio}}".
 *
 * @property int $id
 * @property string $name
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
            [['name'], 'required'],
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
    public function getPortfolioStructures()
    {
        return $this->hasMany(PortfolioStructure::className(), ['portfolio_id' => 'id']);
    }
}
