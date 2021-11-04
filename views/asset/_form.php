<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $formattedAssetName app\models\AssetType */
/* @var $accounts app\models\Account */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $assetsTypeData app\models\Asset */

const currency = ["PLN", "EUR", 'USD', 'GBP'];
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
        ]])->dropdownList(ArrayHelper::map($accounts, 'id', 'name'),
        ['prompt'=>'Choose account here:']) ?>

    <?= $form->field($model, 'asset_type_id',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
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
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
