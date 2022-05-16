<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;
use app\assets\CommentAsset;


/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $comment app\models\Comment */
/* @var $publishedComments app\models\Comment */



$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
CommentAsset::register($this);
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
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <section id="comments">
                    <?php foreach($publishedComments as $publishedComment):
                        ?>
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                                                src="https://i.imgur.com/RpzrMR2.jpg"
                                                                                width="40" height="40"
                                        >
                                        <div class="d-flex flex-column justify-content-start ml-2"><span
                                                    class="d-block font-weight-bold name"><?php echo ucfirst(Yii::$app->user->identity->getDisplayName()) ?></span>

                                            <span class="date text-black-50">Shared publicly <?php echo $publishedComment->date ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="close delete-comment-btn" id="<?php echo $publishedComment->id ?>" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-1">
                                <p class="comment-text mb-1"><?php echo $publishedComment->textarea ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>

                <?php $form = ActiveForm::begin([
                    'id' => 'comment-form',
                    'action' => ['comment/asset'],
                    'options' => ['class'=>'comment'],
                    'fieldConfig' => [
                        'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    ]]); ?>
                <div class="card-footer bg-light p-2">
                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                        <div class="ml-2" id="description">
                            <?= $form->field($comment, 'textarea', [
                                'inputOptions' => [

                                    'placeholder' => 'Enter your notes here...',
                                ]])->textarea(array('rows'=>2,'cols'=>120))?>
                        </div>
                    </div>
                    <div class="mt-2 text-right">

                        <button type="button" class="btn btn-primary "id="submit-btn">Post Comment</button>
                        <button type="button" class="btn btn-outline-primary"id="cancel-btn">Cancel</button>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//        New Comment Section
$this->registerJs('
   $(function() {
   var username = '. json_encode(ucfirst(Yii::$app->user->identity->getDisplayName())). ';
   var action_url = '. json_encode('index.php?r=comment%2Fasset&id='.$model->id). ';
        sendComment("#submit-btn", username, action_url);
    });');

//         Delete Comment Button
$this->registerJs('
    $(function () {
    var action_url = '. json_encode('index.php?r=comment%2Fdelete&id='). ';
        deleteComment(".delete-comment-btn", action_url);
    });')

?>