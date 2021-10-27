<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\bootstrap4\ActiveForm */

?>

<div class="account-form">

    <div class="form-group">

        <?php $form = ActiveForm::begin([
            'id' => 'account-form',
            'options' => ['class'=>'account'],
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

        <?= $form->field($model, 'account_holder', [
            'inputOptions' => [
                'class' => 'custom-select custom-select-sm',
            ]])->dropdownList([
            'Ania' => account_holder[0],
            'Radek' => account_holder[1],
        ],
            ['prompt'=>'Choose account holder here:']) ?>


        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
