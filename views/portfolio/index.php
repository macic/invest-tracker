<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $items app\models\Portfolio  */
/* @var $asset string  */


$this->title = 'Portfolio Structures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-structure-index">

    <h1> Your portfolios:</h1>
    <br>

<div class="row">
<!--    add new div-->
    <div class="col-xl-4 col-lg-5 align-items-center">
        <div class="card shadow mb-4">
            <!-- Add portfolio Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add new one:</h6>
            </div>
            <!-- Add portfolio cart Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo yii\helpers\Url::to(['create'])?>">
                        <div class="sidebar-brand-icon">
                            <i class="fas fa-plus-circle" style="font-size: 15rem"></i>
                        </div>
                    </a>
                </div>
                <hr>
                Create new portfolio structure.
            </div>
        </div>
    </div>

<!--    existing portfolios view-->
    <?php foreach($items as $item): ?>
    <div class="col-xl-4 col-lg-5 align-items-center">
        <div class="card shadow mb-4">

            <!-- Portfolio Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $item['name'] ?></h6>
            </div>
            <!-- Portfolio Chart Body -->
            <div class="card-body">

                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo yii\helpers\Url::to(['/portfolio/view', 'id'=>$item['id']])?>">
                        <div class="chart-pie pt-0">
                            <canvas id="portfolio-charts-<?php echo $item['id']?>"></canvas>
                        </div>
                    </a>
                <hr>
                <?php
                $labels = array();
                $data =   array();
                foreach ($item->portfolioStructure as $structure) {

                    $labels[] = $structure->type;
                    $data[] = $structure->percentage;

                    echo $structure->type . ": " . $structure->percentage . " % <br>";
                }?>
            </div>
        </div>
    </div>
        <?php
        $this->registerJs('
   $(function() {
   var labels = '. json_encode($labels). ';
   var data = '. json_encode($data). ';
        displayDonut($("#portfolio-charts-'. $item['id'] .'"), labels, data);
    });');
        ?>

    <?php endforeach; ?>
</div>
</div>

