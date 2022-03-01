<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $item app\models\Portfolio */
/* @var $assetsTypeData app\models\Asset */

//$this->title = $item->name;
//\yii\web\YiiAsset::register($this);
?>
<div class="portfolio-structure-view">

    <h1><?= Html::encode($item->name) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $item->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $item->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this portfolio?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="row">
    <div class="col">
        <table class="table table-hove table-striped">
        <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col"> Declared %</th>
            <th scope="col"> Real %</th>
            <th scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($item->portfolioStructure as $structure): ?>
        <tr>
            <td><a class="collapse-item" href="<?php echo \yii\helpers\Url::to(['/portfolio/list', 'portfolio_id'=>$structure['portfolio_id'], 'asset_type_id'=>$structure['asset_type_id']])?>"><?php echo $structure->type ?></td>
            <td><?php echo $structure->percentage ?> %</td>
            <td> <?= $item->getRealValue($structure->asset_type_id); ?> %</td>
            <td><?= $item->getAssetTypeValue($structure->asset_type_id); ?> PLN</td>
        </tr>
        <?php endforeach; ?>

        </tbody>

            <tfoot>
            <td></td>
            <td></td>
            <td>Summary:</td>
            <td><?= $item->getSummary() ?> PLN</td>
            </tfoot>
        </table>
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-0">
                    <canvas id="portfolio-charts"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



   <?php

   $labels = array();
   $data = array();

   foreach ($item->portfolioStructure as $structure) {

       $labels[] = $structure->type;
       $data[] = $structure->percentage;
    } ?>
        <div class="chart">
            <div class="col chart-wrapper" ><canvas id="portfolio-charts"></canvas></div>
        </div>
        <?php     $this->registerJs('
   $(function() {
   var labels = '. json_encode($labels). ';
   var data = '. json_encode($data). ';
        displayDonut($("#portfolio-charts"), labels, data);
    });');

    ?>
