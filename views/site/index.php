<?php

/* @var $this yii\web\View */
/* @var $items array */
/* @var $sum float */



use app\assets\AppAsset;

AppAsset::register($this);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<header class="width: 100% bg-gradient-primary pb-10 rounded-bottom">
    <div class="container-fluid px-4">
        <div class="page-header-content py-3">
            <div class="row align-items-center">
                <div class="col-auto mt-4 mb-5">
                    <h1 class="page-header-title text-light">
                        Dashboard
                    </h1>
<!--                    <div class="page-header-subtitle mb-3">Example dashboard overview and content summary</div>-->
                </div>
            </div>
        </div>
    </div>
</header>

<!-- TradingView Widget BEGIN -->
<!--<div class="trading view container-xl mt-n10">-->
<!--    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>-->
<!--        {-->
<!--            "symbols": [-->
<!--            {-->
<!--                "proName": "FOREXCOM:SPXUSD",-->
<!--                "title": "S&P 500"-->
<!--            },-->
<!--            {-->
<!--                "proName": "FOREXCOM:NSXUSD",-->
<!--                "title": "US 100"-->
<!--            },-->
<!--            {-->
<!--                "proName": "FX_IDC:EURUSD",-->
<!--                "title": "EUR/USD"-->
<!--            },-->
<!--            {-->
<!--                "proName": "BITSTAMP:BTCUSD",-->
<!--                "title": "Bitcoin"-->
<!--            },-->
<!--            {-->
<!--                "description": "WIG20",-->
<!--                "proName": "GPW:WIG20"-->
<!--            }-->
<!--        ],-->
<!--            "showSymbolLogo": true,-->
<!--            "colorTheme": "light",-->
<!--            "isTransparent": false,-->
<!--            "displayMode": "adaptive",-->
<!--            "locale": "en"-->
<!--        }-->
<!--    </script>-->
<!--</div><br>-->
<!-- TradingView Widget END -->


<div class="site-index">

    <!-- Content Row -->
    <div class="container mt-n5">
    <div class="row">

        <!-- Safety Cushion Card Zostawiam bo fajny progress bar tu jest -->
<!--        <div class="col-xl-3 col-md-6 mb-4">-->
<!--            <div class="card border-left-primary shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                    <div class="row no-gutters align-items-center">-->
<!--                        <div class="col mr-2">-->
<!--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">-->
<!--                                safety cushion</div>-->
<!--                            <div class="row no-gutters align-items-center">-->
<!--                                <div class="col-auto">-->
<!--                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>-->
<!--                                </div>-->
<!--                                <div class="col">-->
<!--                                    <div class="progress progress-sm mr-2">-->
<!--                                        <div class="progress-bar bg-primary" role="progressbar"-->
<!--                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
<!--                                             aria-valuemax="100"></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-auto">-->
<!--                            <i class="fas fa-bed fa-2x text-gray-300"></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <?php foreach ($items as $portfolio):?>
        <!-- Portfolio Cards -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-<?php echo $portfolio->color ?> shadow h-100 py-2">
                <div class="card-body">
                    <a class="row no-gutters align-items-center" style="text-decoration:none;" href="<?php echo yii\helpers\Url::to(['/portfolio/view', 'id'=>$portfolio['id']])?>">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-<?php echo $portfolio->color ?> text-uppercase mb-1">
                                <?php echo $portfolio->name; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($portfolio->getSummary(), 2, '.', ' ') . " PLN" ?>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="<?php echo $portfolio->icon ?> fa-2x text-gray-300"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach ?>

        <!-- Speculating Card -->
<!--        <div class="col-xl-3 col-md-6 mb-4">-->
<!--            <div class="card border-left-info shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                    <div class="row no-gutters align-items-center">-->
<!--                        <div class="col mr-2">-->
<!--                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dyvidend wallet-->
<!--                            </div>-->
<!--                            <div class="h5 mb-0 font-weight-bold text-gray-800">21,000 PLN</div>-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-auto">-->
<!--                            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Total Balance Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                total balace</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum, 2, '.', ' ') . " PLN" ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas bi bi-bank fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="body-content container">

        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Wealth Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <hr>
                        Styling for the area chart can be found in the
                        <code>/js/demo/chart-area-demo.js</code> file.
                    </div>
                </div>

            </div>
            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Portfolio Chart</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        Total Balance:
                        <?php echo number_format($sum, 2, '.', ' ') . " PLN" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

$labels = array();
$data = array();

foreach ($items as $portfolio) {
    $labels[] = $portfolio->name;
    $data[] = $portfolio->getSummary();
}

$this->registerJs('
   $(function() {
   var labels = '. json_encode($labels). ';
   var data = '. json_encode($data). ';
        displayDonut($("#myPieChart"), labels, data);
    });');

$this->registerJs('
   $(function() {
        displayArea($("#myAreaChart"), ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000]);
    });');
?>

