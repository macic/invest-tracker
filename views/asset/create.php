<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $accounts app\models\Account */
/* @var $formattedAccounts app\models\Account */

$this->title = 'Create Asset';
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'accounts' => $accounts,
        'formattedAccounts' => $formattedAccounts
    ]) ?>

</div>
