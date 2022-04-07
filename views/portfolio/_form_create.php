<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $portfolioStructure app\models\PortfolioStructure */
/* @var $portfolio app\models\Portfolio */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $assetsTypeData app\models\Asset */
?>


<div class="portfolio-structure-form">
    <div id="form">

    <?php $form = ActiveForm::begin(['validateOnSubmit' => false]); ?>

    <?= $form->field($portfolio, 'name')->textInput() ?>

    <?php for($i=1;$i<=8;$i++) {
        if ($i>1) {
            $display = 'd-none';
        } else {
            $display = '';
        }
        ?>
    <?= $form->field($portfolioStructure, 'asset_type_id[]',[
            'options' => ['class' => 'form-group '.$display],
            'inputOptions' => [
                'class' => 'custom-select assets',
                'id' =>  'asset_type_id_'.$i,
            ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
            ['prompt'=>'Choose asset type here:']) ?>

    <?= $form->field($portfolioStructure, 'percentage[]', [
            'options'=>[
                    'class'=>'form-group '.$display,
                    'selectors' => ['input' => '#percentage_'.$i],]])->textInput([
                        'id'=>'percentage_'.$i,
                        'class' => 'form-control assets']);
    ?>

    <?php } ?>
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-outline-info btn-sm" id="add-portfolio-asset-btn">Add asset type</button>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $html = $form->field($portfolioStructure, 'asset_type_id[]',[
    'inputOptions' => [
        'class' => 'custom-select',
    ]])->dropdownList(ArrayHelper::map($assetsTypeData, 'id', 'name'),
    ['prompt'=>'Choose asset type here:']);
    $html .= $form->field($portfolioStructure, 'percentage[]')->textInput(); ?>




