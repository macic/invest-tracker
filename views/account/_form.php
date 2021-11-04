<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $holderName app\models\Account */
/* @var $holder app\models\AccountHolder */


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#add-holder-btn").click(function(){
            $("#account-holder-div").toggle();
        });
    });
</script>

<div class="account-form">

    <div class="form-group">

        <?php $form = ActiveForm::begin([
            'id' => 'account-form',
            //'options' => ['class'=>'account'],
//            'fieldConfig' => [
//                'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
//           ]
        ]); ?>

        <?= $form->field($model, 'account_type', [
            'inputOptions' => [
                'class' => 'custom-select custom-select-sm',
            ]
        ])->dropdownList([
            'IKE' => account_type[0],
            'IKZE' => account_type[1],
            'Government Bonds' => account_type[2],
            'Broker Account' => account_type[3],
            'Gold' => account_type[4]
        ],
            ['prompt'=>'Choose account type here:']) ?>

        <?= $form->field($model, 'broker', [
            'inputOptions' => [
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Type here broker name...',
            ]])->textInput(['maxlength' => true])?>

        <?= $form->field($model, 'account_holder_id', [
            'inputOptions' => [
                'class' => 'custom-select custom-select-sm',
            ]])->dropdownList(ArrayHelper::map($holderName, 'id', 'name'),
        ['prompt'=>'Choose account holder here:']) ?>


        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>
</div>

<button id="add-holder-btn">Add new holder</button>

<div style="display: none;" id="account-holder-div" class="form-group">

    <?php $form = ActiveForm::begin([
        'id' => 'account-holder-form',
        'action' => ['account-holder/create'],
    ]); ?>

    <?= $form->field($holder, 'name', [
        'inputOptions' => [
            'class' => 'form-control form-control-sm',
            'type' => 'text',
            'placeholder' => 'Type here new account holder...'
        ]])->textInput() ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>
</div>


