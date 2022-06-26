<?php

namespace app\commands;

use app\models\AssetPriceHistory;
use DateTime;
use Yii;
use yii\helpers\Url;
use yii\console\Controller;
use yii\console\ExitCode;
use GuzzleHttp\Client;
use app\models\Asset;

class MarketstackController extends Controller
{
    const BASE_URI = 'http://api.marketstack.com/v1/tickers/';

    private function getAllDistinctAssets()
    {
        // as of now it's not distinct
        #return Asset::find()->select(['id', 'ticker', 'stock'])->distinct()->all();
        return Asset::find()->select(['id', 'ticker', 'stock', 'buy_date'])->all();
    }

    public function actionUpdateAllSymbols()
    {
        // rough idea:
        // get all unique symbols we have in database
        // api quote them for last year + save to db. max 4 requests per symbol (100 items per request)
        // uber important upgrade: before hitting the API, check whether data already exists in DB :)
        $now = new DateTime();
        $today = $now->format('Y-m-d');


        // get all unique symbols
        foreach($this->getAllDistinctAssets() as $asset){
            $start_date =MarketstackController::getMaxDateForAsset($asset);
            if($start_date == $today) {
                // not calling API as we have the data already
                continue;
            }
            // @WARNING assetpricehistory contains asset_id which might be duplicated between same asset+stock
            $symbol=strtolower($asset->ticker.'.'.$asset->stock);
            // implement cache mechanism here, instead of blindly calling the API
            print($asset->id);
            print('
            ');
            print($start_date);
            exit();
            $prices = MarketstackController::getAssetPriceForDateRange($symbol, $start_date, $today);
            foreach($prices as $price) {
                // for each data point we have lets create a record
                $asset_price = new AssetPriceHistory();
                $asset_price->asset_id = $asset->id;
                $ts = strtotime($price['date']);
                $asset_price->date = date('Y-m-d', $ts);
                $asset_price->price = $price['price'];
                if (!$asset_price->save()) {
                    // errors while storing
                    print_r($asset_price->getErrors());
                    throwException();
                }
            }
        }
    }

    public static function getMaxDateForAsset($asset) {
        // cache mechanism
        // get max date for given asset_id we have in db, start fetching from API since that day
        $max_date = AssetPriceHistory::find()->where(['asset_id'=>$asset->id])->max('date');
        if($max_date) {
            $start_date = $max_date;
        } else {
            $start_date = $asset->buy_date;
        }
        return $start_date;
    }

    public static function getAssetPriceForDateRange($symbol, $date_from, $date_to)
    {
        $api_key = Yii::$app->params['marketstockApiKey'];
        $client = new Client(['base_uri' => self::BASE_URI, 'http_errors' => false]);
        $data = [];
        $response = $client->request('GET', sprintf('%s/eod', strtolower($symbol)), [
            'query' =>
                [
                    'access_key' => $api_key,
                    'date_from' => $date_from,
                    'date_to' => $date_to,
                    'limit' => 1000
                ],
        ]);
        $status_code = $response->getStatusCode();
        if ($status_code == 200) {
            $results = json_decode($response->getBody(), true);
            foreach ($results['data']['eod'] as $result) {
                array_push($data, ['price' => $result['close'], 'date' => $result['date']]);
            }
        } else if ($status_code == 404) {
            return [];
        } else {
            throwException();
        }
        return $data;
    }
}