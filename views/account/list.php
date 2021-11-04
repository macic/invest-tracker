<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $items yii\models\Account */
/* @var $account_type string */


$this->title = $account_type;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asset-etf">

    <p>
        <?= Html::a('Add  ' . $account_type, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <ul class="list-group">

            <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                Your <?= $account_type ?> accounts:
                <span class="badge badge-primary badge-pill">
                Holder:</span>
            </li>

            <?php foreach($items as $item): ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $item['account_type'] ?>
                <span class="badge badge-primary badge-pill">
                    <?php echo $item->account->accountHolder->name ?>

                    <?php endforeach; ?>

            </li>
        </ul>
    </div>
</div>

