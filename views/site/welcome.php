<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $accounts yii\models\Account */
/* @var $account yii\models\Account */
/* @var $items yii\models\Asset */
/* @var $account_type string */
/* @var $asset_type_id string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Age - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/welcome_styles.css" rel="stylesheet" />



        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top">
                        <div class="sidebar-brand-text mx-3"><i class="fab fa-artstation" style="font-size: 1.5rem"></i> Invest Tracker</div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#pricing">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="<?php yii\helpers\Url::to(['site/login'])?>">Login</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Send Feedback</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        </nav>
    </head>

    <body id="page-top">
    <!-- Navigation-->

    <header class="page-header-ui page-header-ui-dark bg-gradient-primary-to-secondary">
        <div class="page-header-ui-content mb-n5">
            <!-- Jeden iPhone-->
<!--            <div class="container px-5">-->
<!--                <div class="row gx-5 justify-content-center align-items-center">-->
<!--                    <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">-->
<!--                        <h1 class="display-2 page-header-ui-title text-light font-alt">Track your investments easier than ever!</h1>-->
<!--                        <p class="page-header-ui-text mb-5 ">Marketing pages for your mobile app have never been easier. Get started now!</p>-->
<!--                        <div class="d-flex flex-column flex-lg-row align-items-center">-->
<!--                            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>-->
<!--                            <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 z-1 aos-init aos-animate" data-aos="fade-left">-->
<!--                        <div class="device-wrapper mx-auto mb-n15">-->
<!--                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">-->
<!--                                <div class="screen"><img class="img-fluid z-1" src="https://source.unsplash.com/eluzJSfkNCk/518x1122"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="svg-border-waves text-white">
            <!-- Wave SVG Border-->
            <svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
                <defs>
                    <style>
                        .a {
                            fill: none;
                        }
                        .b {
                            clip-path: url(#a);
                        }
                        .d {
                            opacity: 0.5;
                            isolation: isolate;
                        }
                    </style>
                </defs>
                <clipPath id="a"><rect class="a" width="1920" height="75"></rect></clipPath>
                <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path></g>
                <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path></g>
                <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path></g>
                <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path></g>
            </svg>
        </div>
<!--        Dwa iPhony -->
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 text-light mb-3 font-alt">Track your investments easier than ever!</h1>
                        <p class="lead fw-normal text-muted mb-5 font-alt">Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                            <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="assets/img/iphone.png" style="max-width: 100%; height: 100%"/>

                </div>
            </div>
        </div>
<!--        Fioletowe Fale -->
        <div class="svg-border-waves text-white">
            <!-- Wave SVG Border-->
            <svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
                <defs>
                    <style>
                        .a {
                            fill: none;
                        }
                        .b {
                            clip-path: url(#a);
                        }
                        .d {
                            opacity: 0.5;
                            isolation: isolate;
                        }
                    </style>
                </defs>
                <clipPath id="a"><rect class="a" width="1920" height="75"></rect></clipPath>
                <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path></g>
                <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path></g>
                <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path></g>
                <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path></g>
            </svg>
        </div>
    </header>
    <!-- Pricing features -->
    <section id="pricing">
    <div class="container px-5">
        <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                <p class="text-muted mb-0">Most popular</p>
                <h3 class="font-alt">Free Trail</h3>
                <br>
                <p class="text-muted mb-0">• Try for one month,
                    for free</p>
                <p class="text-muted mb-0">• Includes one portfolio</p>
                <p class="text-muted mb-0">• 20 assets to add</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                <p class="text-muted mb-0">0,33€ per Trading Day</p>
                <h3 class="font-alt">10€ / month</h3>
                <p class="text-muted mb-0">• Limitless portfolios</p>
                <p class="text-muted mb-0">• Limitless assets & accounts</p>
                <p class="text-muted mb-0">• Family accounts</p>
                <p class="text-muted mb-0">• Personal dashboard</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">

                <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                <p class="text-muted mb-0">Best offer!</p>
                <h3 class="font-alt">69€ / year</h3>
                <p class="text-muted mb-0">• Limitless portfolios</p>
                <p class="text-muted mb-0">• Limitless assets & accounts</p>
                <p class="text-muted mb-0">• Family accounts</p>
                <p class="text-muted mb-0">• Personal dashboard</p>
                <p class="text-muted mb-0">• Technical support & help desk</p>
            </div>
        </div>
    </div>
    </div>
    </section>


    <!-- Polecajki -->
<!--    <aside class="text-center bg-gradient-primary-to-secondary">-->
<!--        <div class="container px-5">-->
<!--            <div class="row gx-5 justify-content-center">-->
<!--                <div class="col-xl-8">-->
<!--                    <div class="h2 fs-1 text-white mb-4">"An intuitive solution to a common problem that we all face, wrapped up in a single app!"</div>-->
<!--                    <img src="assets/img/tnw-logo.svg" alt="..." style="height: 3rem" />-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </aside>-->
    <!-- App features section-->
<!--    <section id="features">-->
<!--        <div class="container px-5">-->
<!--            <div class="row gx-5 align-items-center">-->
<!--                <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">-->
<!--                    <div class="container-fluid px-5">-->
<!--                        <div class="row gx-5">-->
<!--                            <div class="col-md-6 mb-5">-->
<!--                                <!-- Feature item-->-->
<!--                                <div class="text-center">-->
<!--                                    <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>-->
<!--                                    <h3 class="font-alt">Device Mockups</h3>-->
<!--                                    <p class="text-muted mb-0">Ready to use HTML/CSS device mockups, no Photoshop required!</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6 mb-5">-->
<!--                                <!-- Feature item-->-->
<!--                                <div class="text-center">-->
<!--                                    <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>-->
<!--                                    <h3 class="font-alt">Flexible Use</h3>-->
<!--                                    <p class="text-muted mb-0">Put an image, video, animation, or anything else in the screen!</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-6 mb-5 mb-md-0">-->
<!--                                <!-- Feature item-->-->
<!--                                <div class="text-center">-->
<!--                                    <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>-->
<!--                                    <h3 class="font-alt">Free to Use</h3>-->
<!--                                    <p class="text-muted mb-0">As always, this theme is free to download and use for any purpose!</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-6">-->
<!--                                <!-- Feature item-->-->
<!--                                <div class="text-center">-->
<!--                                    <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>-->
<!--                                    <h3 class="font-alt">Open Source</h3>-->
<!--                                    <p class="text-muted mb-0">Since this theme is MIT licensed, you can use it commercially!</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 order-lg-0">-->
<!--                    <!-- Features section device mockup-->-->
<!--                    <div class="features-device-mockup">-->
<!--                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <defs>-->
<!--                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">-->
<!--                                    <stop class="gradient-start-color" offset="0%"></stop>-->
<!--                                    <stop class="gradient-end-color" offset="100%"></stop>-->
<!--                                </linearGradient>-->
<!--                            </defs>-->
<!--                            <circle cx="50" cy="50" r="50"></circle></svg-->
<!--                        ><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>-->
<!--                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg-->
<!--                        ><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>-->
<!--                        <div class="device-wrapper">-->
<!--                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">-->
<!--                                <div class="screen bg-black">-->
<!--                                    <!-- PUT CONTENTS HERE:-->-->
<!--                                    <!-- * * This can be a video, image, or just about anything else.-->-->
<!--                                    <!-- * * Set the max width of your media to 100% and the height to-->-->
<!--                                    <!-- * * 100% like the demo example below.-->-->
<!--                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="assets/img/demo-screen.mp4" type="video/mp4" /></video>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <!-- Basic features section-->
<!--    <section class="bg-light">-->
<!--        <div class="container px-5">-->
<!--            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">-->
<!--                <div class="col-12 col-lg-5">-->
<!--                    <h2 class="display-4 lh-1 mb-4">Enter a new age of web design</h2>-->
<!--                    <p class="lead fw-normal text-muted mb-5 mb-lg-0">This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! There's plenty of space for text here, so don't worry about writing too much.</p>-->
<!--                </div>-->
<!--                <div class="col-sm-8 col-md-6">-->
<!--                    <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!--    <! -- Call to action section-->-->
<!--    <section class="cta">-->
<!--        <div class="cta-content">-->
<!--            <div class="container px-5">-->
<!--                <h2 class="text-white display-1 lh-1 mb-4">-->
<!--                    Stop waiting.-->
<!--                    <br />-->
<!--                    Start building.-->
<!--                </h2>-->
<!--                <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!--    <! -- App badge section-->-->
<!--    <section class="bg-gradient-primary-to-secondary" id="download">-->
<!--        <div class="container px-5">-->
<!--            <h2 class="text-center text-white font-alt mb-4">Get the app now!</h2>-->
<!--            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">-->
<!--                <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>-->
<!--                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!--    Czarne Fale-->
    <div class="svg-border-waves text-dark">
        <svg _ngcontent-quo-c41="" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75" class="wave" style="pointer-events: none;">
            <defs _ngcontent-quo-c41="">
                <style _ngcontent-quo-c41=""> .a { fill: none; } .b { clip-path: url(#a); } .d { opacity: 0.5; isolation: isolate; } </style><clippath _ngcontent-quo-c41="" id="a"><rect _ngcontent-quo-c41="" width="1920" height="75" class="a"></rect></clippath></defs>
            <title _ngcontent-quo-c41="">wave</title>
            <g _ngcontent-quo-c41="" class="b">
                <path _ngcontent-quo-c41="" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" class="c"></path></g>
            <g _ngcontent-quo-c41="" class="b"><path _ngcontent-quo-c41="" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" class="d"></path></g><g _ngcontent-quo-c41="" class="b"><path _ngcontent-quo-c41="" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" class="d"></path></g><g _ngcontent-quo-c41="" class="b"><path _ngcontent-quo-c41="" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" class="d"></path></g></svg></div>
    <!-- Footer-->
    <footer class="card-footer text-center py-5" style="">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; Invest Tracker</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">FAQ</a>
            </div>
        </div>
    </footer>
    <!-- Feedback Modal-->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 p-4">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
