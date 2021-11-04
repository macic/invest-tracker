<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $holderName app\models\Account */
/* @var $holder app\models\AccountHolder */


$this->title = 'Create an Account';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'holderName' => $holderName,
        'holder' => $holder,
    ]) ?>

</div>
