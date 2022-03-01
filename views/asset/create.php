<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $accountsData app\models\Account */
/* @var $assetsTypeData app\models\Asset */
/* @var $portfolioData app\models\Portfolio */
/* @var $portfolio_id int */
/* @var $asset_type_id int */

$this->title = 'Create Asset';
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $model->asset_type_id = $asset_type_id;
    $model->portfolio_id = $portfolio_id;
    ?>
    <?= $this->render('_form', [
        'model' => $model,
        'accountsData' => $accountsData,
        'assetsTypeData' => $assetsTypeData,
        'portfolioData' => $portfolioData,

    ]) ?>

</div>
