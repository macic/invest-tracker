<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioStructure */
/* @var $assetsTypeData app\models\Asset */


$this->title = 'Update Portfolio Structure: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portfolio-structure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assetsTypeData' => $assetsTypeData
    ]) ?>

</div>
