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
    <div id="form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($portfolio, 'name')->textInput() ?>

    <?php $i = 0; foreach ($portfolioStructure as $structure ): ?>

    <?php if (!empty($structure)) {
        echo $form->field($structure, '['.$i.']id')->hiddenInput(['value'=>$structure->id])->label(false);
    }?>

    <?= $form->field($structure, '['.$i.']asset_type_id',[
        'inputOptions' => [
            'class' => 'custom-select',
        ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
        ['prompt'=>'Choose asset type here:',
          'options' => [$structure->asset_type_id =>["Selected"=>true]]
            ]) ?>

    <?= $form->field($structure, '['.$i.']percentage')->textInput([
            'value' => $structure->percentage
        ]) ?>

    <?php $i++; endforeach; ?>

    <?php $j=$i; for($i=$j;$i<=8;$i++) {
        $display = 'd-none';
        ?>
        <?= $form->field($structure, '['.$i.']asset_type_id',[
            'options' => ['class' => 'form-group '.$display],
            'inputOptions' => [
                'class' => 'custom-select assets',
                'id' =>  'asset_type_id_'.$i,
            ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
            ['prompt'=>'Choose asset type here:']) ?>

        <?= $form->field($structure, '['.$i.']percentage', ['options'=>['class'=>'form-group '.$display, 'selectors' => ['input' => '#percentage_'.$i],]])->textInput(['id'=>'percentage_'.$i,'class' => 'form-control assets']); ?>
        <?= $form->field($structure, '['.$i.']portfolio_id')->hiddenInput(['value'=>$portfolio->id])->label(false); ?>

        <?php } ?>

    </div>
    <div class="form-group">
        <button type="button" class="btn btn-outline-info btn" id="add-portfolio-asset-btn">Add asset type</button>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

