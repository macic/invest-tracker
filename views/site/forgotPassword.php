<?php


/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ForgotPasswordForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

$this->title = 'Forgot Password';
?>

<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                    and we'll send you a link to reset your password!</p>
            </div>
            <?php $form = \yii\bootstrap4\ActiveForm::begin([
                    'id' => 'forgot-password-form',
                    'options' => ['class' => 'user'],
                    'fieldConfig' => [
                            'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}"
                    ]
            ])?>

            <?= $form->field($model, 'email', [
                    'inputOptions' => [
                            'placeholder' => 'Enter your email address...',
                            'class' => 'form-control form-control-user'
                    ]
            ])->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-5 d-none d-lg-block">{image}</div><div class="col-lg-6 d-lg-block">{input}</div></div>',

            ]) ?>

            <?= Html::submitButton('Reset password', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'rest-button']) ?>


            <?php $form = \yii\bootstrap4\ActiveForm::end()?>

            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['site/signup'])?>">Create an Account!</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['site/login'])?>">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
