<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assets:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-index">

    <p>
        <?= Html::a('Create Asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    -->BRAKUJE TUTAJ < ?//= ListView::widget([
//        'dataProvider' => $dataProvider,
//        'itemOptions' => ['class' => 'item'],
//        'itemView' => function ($model, $key, $index, $widget) {
//            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
//        },
//    ]) ?>


</div>
