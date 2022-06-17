<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $portfolioStructure app\models\PortfolioStructure */
/* @var $assetsTypeData app\models\Asset */
/* @var $portfolio app\models\Portfolio */



$this->title = 'Update Portfolio Structure';
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Structures', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $portfolioStructure->id, 'url' => ['view', 'id' => $portfolioStructure->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
<div class="portfolio-structure-update col">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'portfolioStructure' => $portfolioStructure,
        'assetsTypeData' => $assetsTypeData,
        'portfolio' => $portfolio,


    ]) ?>

</div>
<div class="col chart-wrapper" ><canvas id="portfolio-charts"></canvas></div>
</div>
<?php
$this->registerJs('
   $(function() {
        displayDonut($("#portfolio-charts"), ["Stocks", "Bonds", "Gold"], [55, 30, 15]);
    });');
?>
<?php
$this->registerJsFile(Yii::$app->request->BaseUrl . '/js/portfolios-form.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
