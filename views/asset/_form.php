<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-form">

    <div class="form-group">

    <?php $form = ActiveForm::begin([
        'id' => 'account-form',
        'options' => ['class'=>'asset'],

        //'fieldConfig' => [
            //'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        // ]
    ]); ?>

    <?= $form->field($model, 'account_id')->textInput() ?>

    <?= $form->field($model, 'type',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]
    ])->dropdownList([
        'Stocks' => asset_type[0],
        'ETF' => asset_type[1],
        'Gold Units' => asset_type[2],
        'Government Bonds' => asset_type[3]
    ],
        ['prompt'=>'Choose asset type here:']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buy_price')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'last_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'buy_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
