<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $formattedAssetName app\models\AssetType */
/* @var $accountsData app\models\Account */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $assetsTypeData app\models\Asset */
/* @var $portfolioData app\models\Portfolio*/

const currency = ["PLN", "EUR", 'USD', 'GBP'];
?>


<div class="asset-form">

    <div class="form-group">

    <?php $form = ActiveForm::begin([
        'id' => 'account-form',
        'options' => ['class'=>'asset'],

    ]); ?>

        // dodałam do trzech poniższych 'required' => true, i w modelu dopisałam 'required'
        <div class="row">
            <div class="col">
    <?= $form->field($model, 'account_id',[
        'inputOptions' => [
                'required' => true,
                'class' => 'custom-select',
        ]])->dropdownList(ArrayHelper::map($accountsData, 'id', 'accountName'),
        ['prompt'=>'Choose account here:']) ?>
            </div>

            <div class="col">
    <?= $form->field($model, 'asset_type_id',[
        'inputOptions' => [
            'required' => true,
            'class' => 'custom-select',
        ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
        ['prompt'=>'Choose asset type here:']) ?>
            </div></div>

        <div class="row">
            <div class="col">
    <?= $form->field($model, 'portfolio_id',[
            'inputOptions' => [
                'required' => true,
                'class' => 'custom-select',
            ]])->dropdownList(ArrayHelper::map($portfolioData, 'id', 'name'),
            ['prompt'=>'Choose portfolio here:']) ?>
            </div>
            <div class="col">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            </div></div>
        <div class="row">
            <div class="col">
    <?= $form->field($model, 'ticker')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col">
    <?= $form->field($model, 'stock')->textInput(['maxlength' => true]) ?>

            </div></div>
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
            <?= $form->field($model, 'buy_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'YYYY-MM-DD'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
