<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;
use app\assets\CommentAsset;

/* @var $this yii\web\View */
/* @var $item app\models\Portfolio */
/* @var $assetsTypeData app\models\Asset */
/* @var $comment app\models\Comment */
/* @var $publishedComments app\models\Comment */

//$this->title = $item->name;
CommentAsset::register($this);
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

                    <section id="comments">
                        <?php foreach($publishedComments as $publishedComment):
                        ?>
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                                            src="https://i.imgur.com/RpzrMR2.jpg"
                                                                            width="40" height="40"
                                                                            >
                                        <div class="d-flex flex-column justify-content-start ml-2"><span
                                                class="d-block font-weight-bold name"><?php echo ucfirst(Yii::$app->user->identity->getDisplayName()) ?></span>

                                        <span class="date text-black-50">Shared publicly <?php echo $publishedComment->date ?></span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="close delete-comment-btn" id="<?php echo $publishedComment->id ?>" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <p class="comment-text mb-1"><?php echo $publishedComment->textarea ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </section>

                    <?php $form = ActiveForm::begin([
                            'id' => 'comment-form',
                            'action' => ['comment/portfolio'],
                            'options' => ['class'=>'comment'],
                            'fieldConfig' => [
                                'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    ]]); ?>
                    <div class="card-footer bg-light p-2">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                            <div class="ml-2">
                                <?= $form->field($comment, 'textarea', [
                                        'inputOptions' => [
                                            'placeholder' => 'Enter your notes here...']])->textarea(array('rows'=>2,'cols'=>120))?>
                            </div>
                    </div>
                        <div class="mt-2 text-right">

                                <button type="button" class="btn btn-primary "id="submit-btn">Post Comment</button>
                                <button type="button" class="btn btn-outline-primary"id="cancel-btn">Cancel</button>
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

    }

   ?>

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
//        New Comment Section
        $this->registerJs('
   $(function() {
   var username = '. json_encode(ucfirst(Yii::$app->user->identity->getDisplayName())). ';
   var action_url = '. json_encode('index.php?r=comment%2Fportfolio&id='.$item->id). ';
        sendComment("#submit-btn", username, action_url);
    });');

//         Delete Comment Button
        $this->registerJs('
    $(function () {
    var action_url = '. json_encode('index.php?r=comment%2Fdelete&id='). ';
        deleteComment(".delete-comment-btn", action_url);
    });')

        ?>
