<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $comment app\models\Comment */
/* @var $publishedComments app\models\Comment */



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
        <?= Html::a('Add next Asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row mb-3">
        <div class="col-md-10">
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
        </div>
    </div>

    <!-- TradingView Widget BEGIN -->
    <div class="row mb-3">
        <div class="col-md-10">
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
        </div>
    </div>
    <!-- TradingView Widget END -->
    <!--    Comments Section -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <?php foreach($publishedComments as $publishedComment): ?>
                        <div class="card-header bg-white">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo ucfirst(Yii::$app->user->identity->getDisplayName()) ?></span>
                                    <span class="date text-black-50">Shared publicly <?php echo $publishedComment->date ?></span></div>
                            </div>
                            <div class="mt-1">
                                <p class="comment-text" style="margin-bottom: 1px;"><?php echo $publishedComment->textarea ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php $form = ActiveForm::begin([
                        'id' => 'comment-form',
                        'options' => ['class'=>'comment'],
                        'fieldConfig' => [
                            'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                        ]]); ?>
                    <div class="card-footer bg-light p-2">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                            <div class="ml-2" >
                                <?= $form->field($comment, 'textarea', [
                                    'inputOptions' => [
                                        'placeholder' => 'Enter your notes here...',
                                    ]])->textarea(array('rows'=>2,'cols'=>120))?>
                            </div>
                        </div>
                        <div class="mt-2 text-right">
                            <?= Html::submitButton('Post Comment', ['class' => 'btn btn-primary', 'name' => 'post-comment-button']) ?>
                            <?= Html::submitButton('Cancel', ['class' => 'btn btn-outline-primary', 'name' => 'cancel-button']) ?><!--                            <button class="btn btn-outline-primary btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>-->
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
