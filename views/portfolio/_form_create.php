<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\assets\CommentAsset;


/* @var $this yii\web\View */
/* @var $portfolioStructure app\models\PortfolioStructure */
/* @var $portfolio app\models\Portfolio */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $assetsTypeData app\models\Asset */

const color = ["info", "warning", 'success', 'primary'];
?>

<div class="portfolio-structure-form">

    <div id="form">

    <?php $form = ActiveForm::begin(['validateOnSubmit' => false]); ?>

        <div class="form-row">
            <div class="form-group col-md-8">
                <?= $form->field($portfolio, 'name')->textInput() ?>
            </div>

            <div class="form-group col-md-2">
                <?php echo $form->field($portfolio, 'icon', ['options' => [ 'style' => 'margin: 0px']
                ])->hiddenInput(['value'=> null ])->label(null )?>

                <div class="custom-select" id="icon-select">
                    Select
                </div>
<!--                <style>-->
<!--                    #icon-select {-->
<!--                        line-height: 0.75;-->
<!--                    }-->
<!--                </style>-->
<!--                niektóre ikony źle się wyświetlają-->

                <div id="icons" style="display: none;"><br>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item" id="fas bi bi-credit-card"><i class="fas bi bi-credit-card fa-2x text-gray-300"></i></li>
                        <li class="list-group-item" id="fas fa-hand-holding-usd"><i class="fas fa-hand-holding-usd fa-2x text-gray-300" style="font-size:28px;"></i></li>
                        <li class="list-group-item" id="fas bi bi-wallet "><i class="fas bi bi-wallet fa-2x text-gray-300"></i></li>

                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item" id="fas bi bi-bank"><i class="fas bi bi-bank fa-2x text-gray-300"></i></li>
                        <li class="list-group-item" id="fas fa-coins"><i class="fas fa-coins fa-2x text-gray-300"></i></li>
                        <li class="list-group-item" id="fas fa-chart-bar"><i class="fas fa-chart-bar fa-2x text-gray-300"></i></li>
                    </ul>
                </div>
            </div>

            <div class="form-group col-md-2">

                <?= $form->field($portfolio, 'color', ['options' => [ 'style' => 'margin: 0px']
                ])->hiddenInput(['value'=> null ])->label(null )?>

                    <div class="custom-select" id="color-select">
                        <p class="bg-white">Select</p>
                    </div>

                <div id="colors" style="display: none;"><br>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action" id="white">white</li>
                        <li class="list-group-item list-group-item-action bg-primary text-white" id="primary">blue</li>
                        <li class="list-group-item list-group-item-action bg-secondary text-white" id="secondary">grey</li>
                        <li class="list-group-item list-group-item-action bg-success text-white" id="success">green</li>
                        <li class="list-group-item list-group-item-action bg-danger text-white" id="danger">red</li>
                        <li class="list-group-item list-group-item-action bg-warning text-white" id="warning">yellow</li>
                        <li class="list-group-item list-group-item-action bg-info text-white" id="info">water</li>
                        <li class="list-group-item list-group-item-action bg-light" id="light">light</li>
                        <li class="list-group-item list-group-item-action bg-dark text-white" id="dark">dark</li>
                    </ul>
                </div>
            </div>
        </div>

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
    $html .= $form->field($portfolioStructure, 'percentage[]')->textInput();

//        Select Icon
$this->registerJs('
   $(function() {
        selectIcon("#icon-select");
    });');

//      Select Color
$this->registerJs('
   $(function() {
        selectColor("#color-select");
    });');

?>




