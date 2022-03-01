<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $portfolioStructure app\models\PortfolioStructure */
/* @var $portfolio app\models\Portfolio */
/* @var $assetsTypeData app\models\Asset */


$this->title = 'Create Portfolio Structure';
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="portfolio-structure-create col">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_create', [
        'portfolioStructure' => $portfolioStructure,
        'portfolio' => $portfolio,
        'assetsTypeData' => $assetsTypeData,
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
