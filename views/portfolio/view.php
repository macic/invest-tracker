<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $item app\models\Portfolio */
/* @var $assetsTypeData app\models\Asset */
/* @var $comment app\models\Comment */
/* @var $publishedComments app\models\Comment */

//$this->title = $item->name;
//\yii\web\YiiAsset::register($this);
?>
<div class="portfolio-structure-view">

    <h1><?= Html::encode($item->name) . " Portfolio" ?></h1>

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


    <div class="row mb-3">
        <div class="col-md-10">
        <table class="table table-sm table-hover ">
        <thead>
        <tr>
            <th class="table-active" scope="col">Type</th>
            <th class="table-active" scope="col"> Declared %</th>
            <th class="table-active" scope="col"> Real %</th>
            <th class="table-active" scope="col">Value</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($item->portfolioStructure as $structure): ?>
        <tr>
            <td><a class="collapse-item" href="<?php echo \yii\helpers\Url::to(['/portfolio/list', 'portfolio_id'=>$structure['portfolio_id'], 'asset_type_id'=>$structure['asset_type_id']])?>"><?php echo $structure->type ?></td>
            <td><?php echo $structure->percentage ?> %</td>
            <td> <?= $item->getRealValue($structure->asset_type_id); ?> %</td>
            <td><?= number_format($item->getAssetTypeValue($structure->asset_type_id), 2, '.',' '); ?> PLN</td>
        </tr>
        <?php endforeach; ?>

        </tbody>

            <tfoot>
            <td></td>
            <td></td>
            <td class="table-active">Summary:</td>
            <td class="table-active"><?= number_format($item->getSummary(), 2, '.',' ') ?> PLN</td>
            </tfoot>
        </table>
        </div>
    </div>

    <!-- Donut Chart -->
    <div class="row">

        <div class=" col-md-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Declared Value Chart</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-0">
                    <canvas id="portfolio-chart-declared-values"></canvas>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Real Value Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-0">
                        <canvas id="portfolio-chart-real-values"></canvas>
                    </div>
                    <hr>
                    Czy to jest czytelny wykres ?
                </div>
            </div>
        </div>
</div>
<!--    Comments Section -->
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <?php foreach($publishedComments as $publishedComment): ?>
                    <div class="card-header bg-white">
                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo ucfirst(Yii::$app->user->identity->getDisplayName()) ?></span>
                                <span class="date text-black-50">Shared publicly <?php echo $publishedComment->date ?></span></div>
                        </div>
                        <div class="mt-1">
                            <p class="comment-text" style="margin-bottom: 1px;"><?php echo $publishedComment->textarea ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php $form = ActiveForm::begin([
                            'id' => 'comment-form',
                            'options' => ['class'=>'comment'],
                            'fieldConfig' => [
                                'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    ]]); ?>
                    <div class="card-footer bg-light p-2">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                            <div class="ml-2" >
                                <?= $form->field($comment, 'textarea', [
                                'inputOptions' => [
                                    'placeholder' => 'Enter your notes here...',
                                ]])->textarea(array('rows'=>2,'cols'=>120))?>
                            </div>
                    </div>
                        <div class="mt-2 text-right">
                            <?= Html::submitButton('Post Comment', ['class' => 'btn btn-primary', 'name' => 'post-comment-button']) ?>
                            <?= Html::submitButton('Cancel', ['class' => 'btn btn-outline-primary', 'name' => 'cancel-button']) ?>
<!--                            <button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button>-->
<!--                            <button class="btn btn-outline-primary btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>-->
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



   <?php

   $labels = array();
   $data = array();
   $realData = array();
   $colors = ['#e74a3b', '#fd7e14', '#858796'];
   $hoverColors = [];

   foreach ($item->portfolioStructure as $structure) {

       $labels[] = $structure->type;
       $data[] = $structure->percentage;
       $realData[] = $item->getRealValue($structure->asset_type_id);
    } ?>
        <div class="chart">
            <div class="col chart-wrapper" ><canvas id="portfolio-charts"></canvas></div>
        </div>
        <?php
//        Declared Values Chart
        $this->registerJs('
   $(function() {
   var labels = '. json_encode($labels). ';
   var data = '. json_encode($data). ' ;
   
   
        displayDonut($("#portfolio-chart-declared-values"), labels, data);
    });');
//        Real Values Chart
        $this->registerJs('
   $(function() {
   var labels = '. json_encode($labels). ';
   var realData = '. json_encode($realData). ';
        displayDonut($("#portfolio-chart-real-values"), labels, realData, '.json_encode($colors).', '.json_encode($hoverColors).');
        
    });');

    ?>
