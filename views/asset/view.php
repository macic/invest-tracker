<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */



$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
            'accountName',
            'ticker',
            'Stock',
            'buy_price',
            'currency',
            'last_price',
            'quantity',
            'buy_date',
            'portfolioName',
            'value'

        ],
    ]) ?>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div id="tradingview_017a7"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.MediumWidget(
                {
                    "symbols": [
                        [
                            "<?= $model->stock ?>:<?= $model->ticker ?>|12M"
                        ]
                    ],
                    "chartOnly": false,
                    "width": 1000,
                    "height": 400,
                    "locale": "en",
                    "colorTheme": "light",
                    "gridLineColor": "rgba(240, 243, 250, 0)",
                    "fontColor": "#787B86",
                    "isTransparent": false,
                    "autosize": false,
                    "showVolume": false,
                    "scalePosition": "no",
                    "scaleMode": "Normal",
                    "fontFamily": "Trebuchet MS, sans-serif",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "chartType": "area",
                    "lineColor": "#2962FF",
                    "bottomColor": "rgba(41, 98, 255, 0)",
                    "topColor": "rgba(41, 98, 255, 0.3)",
                    "container_id": "tradingview_017a7"
                }
            );
        </script>
    </div>
    <!-- TradingView Widget END -->

</div>
