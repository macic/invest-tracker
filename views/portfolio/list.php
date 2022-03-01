<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
#/* @var $items yii\models\Account */
/* @var $items yii\models\Asset */
#/* @var $account_type string */
/* @var $portfolio_id integer */
/* @var $model app\models\Asset */
/* @var $formattedId app\models\Portfolio */
/* @var $formattedAssetName app\models\Asset */


$this->title = implode("", $formattedId);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="portfolio-id-list-of-asset">

    <p>
        <?= Html::a('Add asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div>
        <ul class="list-group">


            <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                <?= implode("", $formattedId) . ' Portfolio: ' . strtolower(implode("", $formattedAssetName)) . ' list'?>
                <span class="badge badge-primary badge-pill">
                Account:</span>
            </li>

            <?php foreach($items as $item): ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="collapse-item" href="<?= yii\helpers\Url::to(['asset/view', 'id' => $item['id']])?>"><?php echo $item['name'] ?></a>
                <span class="badge badge-primary badge-pill">
                    <?php echo $item->account->accountName ?>

                    <?php endforeach; ?>

            </li>
        </ul>
    </div>
</div>