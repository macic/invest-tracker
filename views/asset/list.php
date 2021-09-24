<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $items yii\models\Account */
/* @var $accounts yii\models\Account */
/* @var $formattedAccounts app\models\Account */
/* @var $asset_type string */


$this->title = $asset_type;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asset-etf">

    <p>
        <?= Html::a('Add  ' . $asset_type, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <ul class="list-group">

            <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                Your <?= $asset_type ?> wallet:
                <span class="badge badge-primary badge-pill">
                Account:</span>
            </li>

            <?php foreach($items as $item): ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $item['name'] ?>
                    <span class="badge badge-primary badge-pill">
                    <?php echo $item->account->account_type . " - " . $item->account->account_holder?>

                    <?php endforeach; ?>

                </li>
        </ul>
    </div>
</div>

