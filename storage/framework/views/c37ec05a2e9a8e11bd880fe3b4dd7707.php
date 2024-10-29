<!DOCTYPE HTML>
<html>
<head>
    <title>JGstore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="Home/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="Home/css/icomoon.css">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="Home/css/ionicons.min.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="Home/css/bootstrap.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="Home/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="Home/css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="Home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Home/css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="Home/css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="Home/fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="Home/css/style.css">

</head>
<body>

<div class="colorlib-loader"></div>

<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-md-9">
                        <div id="colorlib-logo"><a href="<?php echo e(url('/jgstore')); ?>">JGstore</a></div>
                    </div>
                    <div class="col-sm-5 col-md-3">
                        <form action="#" class="search-wrap">
                            <div class="form-group">
                                <input type="search" class="form-control search" placeholder="Search">
                                <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-left menu-1">
                        <ul>
                            <li class="active"><a href="<?php echo e(url('/jgstore')); ?>">Inicial</a></li>
                            <li class="has-dropdown">
                                <a href="<?php echo e(url('/homem')); ?>">Homem</a>
                            </li>
                            <li class="has-dropdown">
                                <a href="<?php echo e(url('/mulher')); ?>">Mulher</a>
                            </li>
                            <li class="cart"><a href="<?php echo e(url('/carrinho')); ?>"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
                            <?php if(Auth::check()): ?>
                                <li class="cart">
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            <?php else: ?>
                                <li class="cart"><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(Home/images/img_bg_1.jpg);">
                </li>
                <li style="background-image: url(Home/images/img_bg_2.jpg);">
                </li>
                <li style="background-image: url(Home/images/cover-img-1.jpg);">
                </li>
            </ul>
        </div>
    </aside>

    <div class="container">
        <?php echo $__env->yieldContent('Conteudo'); ?>
    </div>

    <div class="colorlib-partner">
        <div class="container">
            <div class="row">
                <div class="col partner-col text-center">
                    <img src="Home/images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="Home/images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="Home/images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="Home/js/jquery.min.js"></script>
<!-- popper -->
<script src="Home/js/popper.min.js"></script>
<!-- bootstrap 4.1 -->
<script src="Home/js/bootstrap.min.js"></script>
<!-- jQuery easing -->
<script src="Home/js/jquery.easing.1.3.js"></script>
<!-- Waypoints -->
<script src="Home/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="Home/js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="Home/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="Home/js/jquery.magnific-popup.min.js"></script>
<script src="Home/js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="Home/js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="Home/js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="Home/js/main.js"></script>

</body>
</html>
<?php /**PATH C:\Users\João DEV\Desktop\JGTESTE\sitetenis-main\resources\views/Home_template/index.blade.php ENDPATH**/ ?>