<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $accounts yii\models\Account */

$this->title = 'Accounts:';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="account-index">

    <p>
        <?= Html::a('Create Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
    <ul class="list-group">

        <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
            Account type:
            <span class="badge badge-primary badge-pill">
                Account holder:</span>
        </li>

        <?php foreach($accounts as $account): ?>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $account['account_type'] ?>
            <span class="badge badge-primary badge-pill">
                <?php echo $account['account_holder'] ?></span>
        </li>
      <?php endforeach; ?>

    </ul>
    </div>
</div>
