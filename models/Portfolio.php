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
            $sum = 0;
            foreach ($assets as $asset) {
                $sum += $asset->buy_price * $asset->quantity;
            }

            if (count($assets) > 0) {
                if($asset->currency == 'EUR') {
                    $sum = ($asset->buy_price * $asset->quantity) * 4.4;

                } elseif($asset->currency == 'GBP') {
                    $sum = ($asset->buy_price * $asset->quantity) * 6;
                }

            return $sum ;

            } else {
                return 0;
            }
    }

    public function getSummary(): float
    { #NAPRAWIć
        $assets = $this->getAssets()->all();
        $sum = 0;

        foreach ($assets as $asset) {

            if (count($assets) > 0) {
                if ($asset->currency == 'EUR') {
                    $sum += ($asset->buy_price * $asset->quantity) * 4.4;

                } elseif ($asset->currency == 'GBP') {
                    $sum += ($asset->buy_price * $asset->quantity) * 6;
                } else {
                    $sum += $asset->buy_price * $asset->quantity;
                }
            }
        }

//        require_once "converter.php";
//        $assets = $this->getAssets()->all();
//        foreach ($assets as $asset) {
//
//
//            $val = $asset->buy_price * $asset->quantity;
//            if ($asset->currency == 'EUR') {
//                $sum += $val * 4.4;
//
//               # WYŁĄCZAM GDYŻ NIE DZIAŁA CONVERTER
//                $sum += convertCurrency($val,'EUR','PLN');
//            } elseif ($asset->currency == 'GBP') {
//                $sum += convertCurrency($val,'GBP','PLN');
//            } elseif ($asset->currency == 'USD') {
//                $sum += convertCurrency($val,'USD','PLN');
//            } else {
//                $sum += $val;
//            }
        return $sum;
    }
    public function getRealValue($asset_type_id) : float
    {
        $real = ($this->getAssetTypeValue($asset_type_id) / $this->getSummary()) * 100;

        return number_format($real, 2);
    }

}
