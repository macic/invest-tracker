<?php

namespace app\models;

use phpDocumentor\Reflection\Types\Null_;
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

    public function getAssetTypeValue($asset_type_id) : float
    {
            $assets = $this->getAssets()->where(['asset_type_id' => $asset_type_id])->all();
            require_once "converter.php";
            $sum = 0;

            foreach ($assets as $asset) {

                $val = $asset->buy_price * $asset->quantity;

                if (count($assets) > 0) {
                    if ($asset->currency == 'EUR') {
                        $sum += convertCurrency($val, 'EUR', 'PLN');
                    } elseif ($asset->currency == 'GBP') {
                        $sum += convertCurrency($val, 'GBP', 'PLN');
                    } elseif ($asset->currency == 'USD') {
                        $sum += convertCurrency($val, 'USD', 'PLN');
                    } else {
                        $sum += $val;
                    }

                } else {
                    return 0;
                }
            }
        return round($sum, 2);
    }

    public function getSummary(): float
    {
        require_once "converter.php";
        $assets = $this->getAssets()->all();
        $sum = 0;

        foreach ($assets as $asset) {
            $val = $asset->buy_price * $asset->quantity;

            if (count($assets) > 0) {
                if ($asset->currency == 'EUR') {
                    $sum += convertCurrency($val, 'EUR', 'PLN');
                } elseif ($asset->currency == 'GBP') {
                    $sum += convertCurrency($val, 'GBP', 'PLN');
                } elseif ($asset->currency == 'USD') {
                    $sum += convertCurrency($val, 'USD', 'PLN');
                } else {
                    $sum += $val;
                }
            }
        }
        return round($sum, 2);
    }

//    public function getSummary() : float
//    {
//        $assets = $this->getAssets()->all();
//        $summary = 0;
//
//        foreach ($assets as $asset) {
//            $summary += $asset->getAssetTypeValue();
//        }
//
//        return round($summary, 2);
//    }
    public function getRealValue($asset_type_id) : float
    {
        if(($this->getSummary())==0) {
            $real = 0;
        } else {
            $real = ($this->getAssetTypeValue($asset_type_id) / $this->getSummary()) * 100;
        }

        return number_format($real, 2);
    }
}
