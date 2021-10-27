<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortfolioStructure */
/* @var $assetsTypeData app\models\Asset */

$this->title = 'Create Portfolio Structure';
$this->params['breadcrumbs'][] = ['label' => 'Portfolio Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-structure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assetsTypeData' => $assetsTypeData
    ]) ?>

</div>
