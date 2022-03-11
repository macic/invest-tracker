<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
<?php $this->beginBody() ?>
<div>
    <!-- Nested Row within Card Body -->
    <?php echo $content ?>
</div>
<!-- Footer -->
<!--<footer class="sticky-footer bg-white">-->
<!--    <div class="container my-auto">-->
<!--        <div class="copyright text-center my-auto">-->
<!--            <span>Copyright &copy; Ania Jeruzal 2022</span>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!-- End of Footer -->
<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>