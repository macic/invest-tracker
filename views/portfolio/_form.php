<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $portfolioStructure array[] */
/* @var $portfolio app\models\Portfolio */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $assetsTypeData app\models\Asset */
?>

<div class="portfolio-structure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($portfolio, 'name')->textInput() ?>

    <?php $i = 0; foreach ($portfolioStructure as $structure ): ?>

    <?php if (!empty($structure)) {
        echo $form->field($structure, 'id['.$i.']')->hiddenInput(['value'=>$structure->id])->label(false);
    }?>

    <?= $form->field($structure, 'asset_type_id['.$i.']',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
        ['prompt'=>'Choose asset type here:',
          'options' => [$structure->asset_type_id =>["Selected"=>true]]
            ]) ?>

    <?= $form->field($structure, 'percentage['.$i.']')->textInput([
            'value' => $structure->percentage
        ]) ?>

    <?php $i++; endforeach; ?>
    <div class="form-group">
            <button type="button" class="btn btn-outline-info btn-sm" id="add-portfolio-asset-btn">Add asset type</button>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

