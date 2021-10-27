<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfolio Structures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-structure-index">

    <h1>Create your portfolio model</h1>

    <p>
        <?= Html::a('Create Portfolio Structure', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type',
            'percentage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
