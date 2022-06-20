<?php
namespace app\commands;

use Yii;
use yii\helpers\Url;
use yii\console\Controller;
use yii\console\ExitCode;
use http\Client;

class MarketstackController extends Controller
{

    public function actionIndex()
    {
        echo "Yes, cron service is running.";
    }

    public function actionHourly()
    {
        // rough idea:
        // get all unique symbols we have in database
        // api quote them for last year + save to db. max 4 requests per symbol (100 items per request)
        // uber important upgrade: before hitting the API, check whether data already exists in DB :)

        $api_key = '957eb6f36fcf281fe6acf68aa63b7ad9'; // move to settings
        // below taken from docs, just move to guzzle?
        $queryString = http_build_query([
            'access_key' => $api_key,
            'date_from' => '2022-06-20',
            'date_to' => '2022-06-20',
        ]);

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
        $ch = curl_init(sprintf('%s?%s', 'http://api.marketstack.com/v1/tickers/pzu.xwar/eod', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        $apiResult = json_decode($json, true);
        print_r($apiResult);

        foreach ($apiResult['data'] as $stockData) {
            echo sprintf('Ticker %s has a day high of %s on %s', $stockData['symbol'], $stockData['high'], $stockData['date']);
        }
    }
}