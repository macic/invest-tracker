<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $accounts app\models\Account */
/* @var $accountsData app\models\Account */
/* @var $assetsTypeData app\models\Asset */
/* @var $portfolioData app\models\Portfolio */

$this->title = 'Update Asset: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'portfolioData' => $portfolioData,
        'assetsTypeData' => $assetsTypeData,
        'accountsData' => $accountsData
    ]) ?>

</div>
