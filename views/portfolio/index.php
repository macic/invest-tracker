<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Portfolio Structures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-structure-index">

    <h1> Your portfolios:</h1>
    <br>

<!--    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="--><?php //echo yii\helpers\Url::to(['create'])?><!--">-->
<!--        <div class="sidebar-brand-icon">-->
<!--            <i class="fas fa-folder-plus" style="font-size: 15rem"></i>-->
<!--        </div>-->
<!--    </a>-->

    <div class="col-xl-4 col-lg-5 align-items-center">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add new one:</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo yii\helpers\Url::to(['create'])?>">
                        <div class="sidebar-brand-icon">
                            <i class="fas fa-folder-plus" style="font-size: 15rem"></i>
                        </div>
                    </a>
                </div>
                <hr>
                Create new portfolio structure.
            </div>
        </div>
    </div>
</div>
</div>
