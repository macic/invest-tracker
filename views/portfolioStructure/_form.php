<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioStructure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-structure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'portfolio_id')->textInput() ?>

    <?= $form->field($model, 'asset_type')->textInput() ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
