<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $items yii\models\Asset */



$this->params['breadcrumbs'][] = $this->title;
?>

<div class="asset-etf">

    <p>
        <?= Html::a('Add asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <ul class="list-group">

            <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                Your  wallet:
                <span class="badge badge-primary badge-pill">
                Account:</span>
            </li>

            <?php foreach($items as $item): ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="collapse-item" href="<?php echo \yii\helpers\Url::to(['/asset/view', 'id'=>$item['id']])?>"><?php echo $item['name'] ?></a>
                <span class="badge badge-primary badge-pill">
                    <?php echo $item->account->accountName ?>

                    <?php endforeach; ?>

            </li>
        </ul>
    </div>
</div>
