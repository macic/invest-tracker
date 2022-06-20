<?php

namespace app\commands;

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
        return Asset::find()->select([ 'ticker', 'stock'])->distinct()->all();
    }

    public function actionUpdateAllSymbols()
    {
        // rough idea:
        // get all unique symbols we have in database
        // api quote them for last year + save to db. max 4 requests per symbol (100 items per request)
        // uber important upgrade: before hitting the API, check whether data already exists in DB :)

        // get all unique symbols
        foreach($this->getAllDistinctAssets() as $asset){
            // @WARNING assetpricehistory contains asset_id which might be duplicated between same asset+stock
            print ($asset->ticker.' ');
            print ($asset->id.' ');
            print ($asset->stock);
            print('
            ');

        }


        $api_key = Yii::$app->params['marketstockApiKey'];
        $client = new Client(['base_uri' => self::BASE_URI]);
        $symbol = 'pzu.xwar';
        return ExitCode::OK;
        $response = $client->request('GET', sprintf('%s/eod', strtolower($symbol)), [
            'query' =>
                [
                    'access_key' => $api_key,
                    'date_from' => '2022-06-20',
                    'date_to' => '2022-06-20'
                ],
        ]);
        $apiResult = json_decode($response->getBody(), true);
        print_r($apiResult);


        /***
         * Array
        (
            [pagination] => Array
                (
                [limit] => 100
                [offset] => 0
                [count] => 1
                [total] => 1
                )

            [data] => Array
                (
                [name] => PZU
                [symbol] => PZU
                [country] =>
                [has_intraday] =>
                [has_eod] => 1
                [eod] => Array
                (
                    [0] => Array
                    (
                        [open] => 29.95
                        [high] => 29.98
                        [low] => 29.44
                        [close] => 29.95
                        [volume] => 1121044
                        [adj_high] =>
                        [adj_low] =>
                        [adj_close] => 29.95
                        [adj_open] =>
                        [adj_volume] =>
                        [split_factor] => 1
                        [dividend] => 0
                        [symbol] => PZU.XWAR
                        [exchange] => XWAR
                        [date] => 2022-06-20T00:00:00+0000
                        )

                )

            )

        )
         */
    }
}