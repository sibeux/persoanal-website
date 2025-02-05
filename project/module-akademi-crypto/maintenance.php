<?php
require_once './data/models.php';


?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Module Akademi Crypto</title>
    <meta name="description" content="Modue Akademi Crypto">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="../image/x-icon"
        href="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429121048_25648503344748809_4247547527410173499_n.png?_nc_cat=104&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeE547SwABNqR2Cce7a0qwQ-t_nP6s95nEO3-c_qz3mcQ8rR7uNT2XsFGMZ9DCVOlEt8kEMxl6wbH2NSHpVoDG-j&_nc_ohc=BkT19M93idgAX_FnX9S&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdSW2oWiG5YL-RODdYF4wLTiH_3crOMtNOAzC2FILdvCBQ&oe=66014CE2">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type=" text/css" media="all">
    <link rel="stylesheet" href="../css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/animate.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" media="all">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/style-experience.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="outer">
            <!-- Google Chrome -->
            <div class="infinityChrome">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <!-- Safari and others -->
            <div class="infinity">
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
            </div>
            <!-- Stuff -->
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
                <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                        <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>

    <!-- mobile header -->
    <header class="mobile-header-1">
        <div class="container">
            <!-- menu icon -->
            <div class="menu-icon d-inline-flex me-4">
                <button>
                    <span></span>
                </button>
            </div>
            <!-- logo image -->
            <div class="site-logo">
                <a href="index.php">
                    <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/430870163_1900336740419039_2546312039253035229_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGQH42PkqE8wNskUqh3XxnhZ7nwm0ub33JnufCbS5vfckE3E_knKHpMOQnjQKqQZcKluCXFsXUXyCqed8WgcYLT&_nc_ohc=06KDwlo1GW4AX_cuVfh&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTGqAiXS_04FOkRwBdPpgnX9I2qoWqzA7ZD1ubZeOVm2g&oe=6616E3DD"
                        alt="SibeUX" />
                </a>
            </div>
        </div>
    </header>

    <!-- desktop header -->
    <header class="desktop-header-1 d-flex align-items-start flex-column">

        <!-- logo image -->
        <div class="site-logo">
            <a href="index.php">
                <img src="https://raw.githubusercontent.com/sibeux/license-sibeux/MyProgram/430870163_1900336740419039_2546312039253035229_n.png"
                    alt="sibeUX" />
            </a>
        </div>

        <!-- main menu -->
        <nav style="overflow:visible;">
            <ul class="vertical-menu scrollspy">
                <li class="active"><a href="#cryptocurrency_investing"><i></i>1. Cryptocurrency Investing</a></li>
                <li><a href="#crypto_trading"><i></i>2. Crypto Trading</a></li>
                <li><a href="#kamus_pattern_crypto"><i></i>3. Kamus Pattern Crypto</a></li>
                <li><a href="#crypto_smart_money"><i></i>4. Crypto Smart Money</a></li>
                <li><a href="#crypto_technical_indicators"><i></i>5. Crypto Technical Indicators</a></li>
                <li><a href="#crypto_fibonacci_secret"><i></i>6. Crypto Fibonacci Secret</a></li>
                <li><a href="#crypto_order_flow"><i></i>7. Crypto Order Flow</a></li>
                <li><a href="#crypto_harmonic_trading"><i></i>8. Crypto Harmonic Trading</a></li>
                <li><a href="#crypto_research"><i></i>9a. Crypto Research</a></li>
                <li><a href="#crypto_investing_strategy"><i></i>9b. Crypto Investing Strategy</a></li>
                <li><a href="#btc_currency_internet"><i></i>10a. Bitcoin The Currency of The Internet</a></li>
                <li><a href="#crypto_investing_principles"><i></i>10b. Crypto Investing Principles</a></li>
                <li><a href="#bitcoin_transaction_depth"><i></i>11a. Bitcoin Transaction in Depth</a></li>
                <li><a href="#crypto_investing_tools"><i></i>11b. Crypto Investing Tools</a></li>
            </ul>
        </nav>

        <!-- site footer -->
        <div class="footer">
            <!-- copyright text -->
            <span class="copyright">© 2024 SibeUX Website.</span>
        </div>

    </header>

    <!-- main layout -->
    <main class="content">

        <!-- 1. Cryptocurrency Investing -->
        <section id="cryptocurrency_investing" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">1. Cryptocurrency Investing</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $cryptocurrency_investing;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 2. Crypto Trading -->
        <section id="crypto_trading" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">2. Crypto Trading</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    foreach ($crypto_trading as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $crypto_trading[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/hqdefault.jpg";
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $crypto_trading[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 3. Kamus Pattern Crypto -->
        <section id="kamus_pattern_crypto" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">3. Kamus Pattern Crypto</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    foreach ($kamus_pattern_crypto as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $kamus_pattern_crypto[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $kamus_pattern_crypto[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 4. Crypto Smart Money -->
        <section id="crypto_smart_money" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">4. Crypto Smart Money</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_smart_money;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 5. Crypto Technical Indicators -->
        <section id="crypto_technical_indicators" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">5. Crypto Technical Indicators</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_technical_indicators;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 6. Crypto Fibonacci Secret -->
        <section id="crypto_fibonacci_secret" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">6. Crypto Fibonacci Secret</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_fibonacci_secret;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 7. Crypto Order Flow -->
        <section id="crypto_order_flow" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">7. Crypto Order Flow</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_order_flow;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 8. Crypto Harmonic Trading -->
        <section id="crypto_harmonic_trading" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">8. Crypto Harmonic Trading</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_harmonic_trading;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 9a. Crypto Research -->
        <section id="crypto_research" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">9a. Crypto Research</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_research;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 9b. Crypto Investing Strategy -->
        <section id="crypto_investing_strategy" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">9b. Crypto Investing Strategy</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_investing_strategy;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 10a. Bitcoin The Currency of The Internet -->
        <section id="btc_currency_internet" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">10a. Bitcoin The Currency of The Internet</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $btc_currency_internet;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 10b. Crypto Investing Principles -->
        <section id="crypto_investing_principles" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">10b. Crypto Investing Principles</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $crypto_investing_principles;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 11a. Bitcoin Transaction in Depth -->
        <section id="bitcoin_transaction_depth" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">11a. Bitcoin Transaction in Depth</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
                    $index = 0;
                    $pattern = '/youtu\.be\/([^\?]+)/';
                    $data = $bitcoin_transaction_depth;
                    foreach ($data as $item) {

                        $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $url = $data[$index][0];
                        preg_match($pattern, $url, $matches);
                        $link_video = "https://www.youtube.com/watch?v=" . $matches[1];

                        if (count($item) > 2) {
                            $thumbnail = $item[2];
                        } else {
                            $thumbnail = "https://img.youtube.com/vi/" .  $matches[1] . "/maxresdefault.jpg";
                        };
                    ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $link_video ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class="title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                        $index++;
                    };
                    ?>
        </section>

        <!-- 11b. Crypto Investing Tools -->
        <section id="crypto_investing_tools" style="padding-top: 70px;">

            <div class="container">

                <!-- section title -->
                <h2 class="section-title wow fadeInUp">11b. Crypto Investing Tools</h2>

                <br>

                <div class="row portfolio-wrapper">
                    <?php
            $index = 0;
            $pattern = '/youtu\.be\/([^\?]+)/';
            $data = $crypto_investing_tools;
            foreach ($data as $item) {

                $formattedNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                $url = $data[$index][0];
                preg_match($pattern, $url, $matches);
                
                ?>
                    <!-- portfolio item -->
                    <div class="col-md-4 col-sm-6 grid-item creative">
                        <a href="<?php echo $url ?>" class="work-video">
                            <div class="portfolio-item rounded shadow-dark">
                                <div class="details">
                                    <span class="term">
                                        <?php echo $formattedNumber ?>
                                    </span>
                                    <h4 class=" title">
                                        <?php echo $data[$index][1] ?>
                                    </h4>
                                    <span class="more-button">
                                        <img src="https://scontent.fmlg5-1.fna.fbcdn.net/v/t1.15752-9/429296947_1546854652760630_8100638436237768936_n.png?_nc_cat=106&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFJaJSmCt5HAZpIZyX131eqPUiMnZYzhyY9SIydljOHJgLnYbnXN_1xJKKS5R048im3eDS0C45gp3Fh6ZSjkAOh&_nc_ohc=EZ5k55sPikoAX_1Pd78&_nc_ht=scontent.fmlg5-1.fna&oh=03_AdTDGgtXG1Er_xAMJ2mv4RKQyklqeb_ti-95OZFHLczZ9Q&oe=660121F8"
                                            class="more-button-image">
                                    </span>
                                </div>
                                <div class="thumb">
                                    <img src="<?php echo $thumbnail ?>" alt="Module Akademi Crypto" />
                                    <div class="mask"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                $index++;
            }
            ;
            ?>
        </section>

    </main>

    <!-- Go to top button -->
    <a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

    <!-- SCRIPTS -->
    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/infinite-scroll.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/particle.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/validator.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/morphext.min.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>