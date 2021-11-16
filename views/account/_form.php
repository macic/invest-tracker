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
            $("#account-holder-div").slideToggle();
        });
    });
</script>

        <?php $form = ActiveForm::begin([
            'id' => 'account-form',
            'options' => ['class'=>'account'],
//            'fieldConfig' => [
//                'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
//           ]
        ]); ?>

        <div class="form-row align-items-center">
            <div class="col-auto">

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
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'broker', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-sm',
                        'placeholder' => 'Type here broker name...',
                    ]])->textInput(['maxlength' => true])?>

            </div>

            <div class="col-auto">
            <?= $form->field($model, 'account_holder_id', [
                'inputOptions' => [
                    'class' => 'custom-select custom-select-sm',
                ]])->dropdownList(ArrayHelper::map($holderName, 'id', 'name'),
                ['prompt'=>'Choose account holder here:']) ?>
            </div>

        </div>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>

<?php \yii\bootstrap4\ActiveForm::end(); ?>

<div class="right">
<button class="btn btn-outline-info btn-sm "id="add-holder-btn">Add new holder</button>
</div>


<div style="display: none;" id="account-holder-div" class="col-md-pull-6">

    <?php $form = ActiveForm::begin([
        'id' => 'account-holder-form',
        'action' => ['account-holder/create'],
    ]); ?>

    <div class="row">
    <div class="col-md-3">


    <?= $form->field($holder, 'name', [
        'inputOptions' => [
            'class' => 'form-control form-control-sm',
            'type' => 'text',
            'placeholder' => 'Type here new account holder...'
        ]])->textInput() ?>
    </div>
    </div>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>



    <?php \yii\bootstrap4\ActiveForm::end(); ?>
</div>


