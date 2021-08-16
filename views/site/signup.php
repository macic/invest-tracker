<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
?>

<div class="row">
    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'options' => ['class'=>'user'],
                'fieldConfig' => [
                    'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                ]
            ]); ?>

            <?= $form->field($model, 'username', [
                    'inputOptions' => [
                            'placeholder' => 'Enter your username',
                            'class' => 'form-control form-control-user'
                    ]
            ])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email', [
                'inputOptions' => [
                    'placeholder' => 'Enter your email address',
                    'class' => 'form-control form-control-user'
                ]
            ])->textInput(['autofocus' => true]) ?>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                            'class' => 'form-control form-control-user',
                            'placeholder' => 'Password'
                    ]
                ]
                )->passwordInput()?>
                </div>
                <div class="col-sm-6">
                <?= $form->field($model, 'password_repeat', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user',
                        'placeholder' => 'Repeat Password'
                    ]
                ]
                )->passwordInput() ?>
                </div>
            </div>


            <?= Html::submitButton('Create an account', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'signin-button']) ?>
            <?php ActiveForm::end()?>

            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['site/forgot-password'])?>">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['site/login'])?>"<a>Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>


