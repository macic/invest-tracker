<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ticker_search}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $ticker
 * @property string|null $ticker_google
 * @property string|null $isin
 *
 */
class TickerSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ticker_search}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ticker'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['ticker', 'ticker_google', 'isin'], 'string', 'max' => 16],
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
            'ticker' => 'Ticker',
            'ticker' => 'Ticker Google',
            'isin' => 'ISIN',
        ];
    }


}
