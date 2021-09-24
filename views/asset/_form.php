<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $accounts app\models\Account */
/* @var $formattedAccounts app\models\Account */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="asset-form">

    <div class="form-group">

    <?php $form = ActiveForm::begin([
        'id' => 'account-form',
        'options' => ['class'=>'asset'],

//        'fieldConfig' => [
//            'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
//         ]
    ]); ?>

    <?= $form->field($model, 'account_id',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]])->dropdownList($formattedAccounts,
        ['prompt'=>'Choose account here:']) ?>

    <?= $form->field($model, 'type',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]
    ])->dropdownList([
        'Stocks' => asset_type[0],
        'ETF' => asset_type[1],
        'Gold Units' => asset_type[2],
        'Government Bonds' => asset_type[3],
        'Cryptocurrency' => asset_type[4]
    ],
        ['prompt'=>'Choose asset type here:']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticker')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col">

    <?= $form->field($model, 'buy_price')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col">
    <?= $form->field($model, 'currency', [
        'inputOptions' => [
            'class' => 'custom-select',
        ]
    ])->dropdownList([
         'PLN' => currency[0],
         'EUR' => currency[1],
        'USD' => currency[2],
        'GBP' => currency[3]
    ],
        ['prompt'=>'Choose currency:']) ?>
    </div>
    </div>


<!--    < ?= $form->field($model, 'last_price')->textInput(['maxlength' => true]) ?>-->

    <div class="row">
        <div class="col">
    <?= $form->field($model, 'quantity')->textInput() ?>
        </div>
        <div class="col">
    <?= $form->field($model, 'buy_date', ['inputOptions'=>['id'=>'datepicker']])?>
<!--    // < ?= $form->field($model,'buy_date')->widget(DatePicker::className())?>-->
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
