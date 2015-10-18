<!DOCTYPE html>
<!--[if lt IE 8]> <html class="lt-ie10 lt-ie9 lt-ie8 unsupported-browser"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>    <html class="lt-ie10 ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="modern-browser" style="margin-top: 0 !important;"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700,800' rel='stylesheet' type='text/css'>
    <meta name="robots" content="noindex" />
    <title>VnEconomist</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta property="og:description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="<?php echo config_item('wp_theme_url'); ?>style.css"/>
    <!--[if lt IE 9]>
    <script src="<?php echo config_item('wp_theme_url'); ?>/js/html5.js"></script>
    <![endif]-->
    <script src="<?php echo config_item('wp_theme_url'); ?>/js/jquery-1.11.3.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script src="<?php echo config_item('asset_url'); ?>default/js/custom-autocomplete.js"></script>
</head>
<?php
    function isSessionUserDataAvailable(){
        if(isset($_SESSION['user_data']) || isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
            return true;
        }
        return false;
    }
?>
<body class="responsive">
<div id="site-wrapper" class="site-wrapper">
    <header id="widget-TopNav" class="top-navigation for-guest">
        <nav role="navigation" class="container">
            <div class="navbar-header">
                <a id="logo" class="pph-logo" href="<?php echo config_item('wp_home_url'); ?>">VnEconomist</a>
            </div>
            <form id="hd-search-form" class="hd-search-form" action="#" method="POST">
                <div style="display:none">
                    <input type="hidden" value="7c9f6e3f89b4c36bbefb39b118569fda405d0a6a" name="YII_CSRF_TOKEN">
                </div>
                <div class="clearfix search-container" id="job-listing-search">
                    <div class="input-group clearfix ">
                        <input id="keyword" placeholder="Search Jobs..." class="form-control" type="text" value="" name="keyword">
						<span class="input-group-btn">
							<button type="button" data-reset-url="/freelance-jobs" class="btn btn-default js-reset-form" style="display: none;">
                                <i class="fa fa-times-circle"></i>
                            </button>
							<button type="submit" class="btn btn-default js-submit-search">
                                <i class="fa fa-search"></i>
                            </button>
						</span>
                    </div>
                </div>
            </form>
            <div class="nav collapse navbar-collapse visible-md visible-lg">
                <?php if(isSessionUserDataAvailable() && isset($_COOKIE['vnup_user'])) { ?>
                    <div class="pull-right menu-block user-menu">
                        <ul>
                            <!-- FAVORITES -->
                            <li class="dropdown mini-menu-item" data-hook="miniMenu">
                                <a href="#" title="Favourites" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fpph fpph-star"></i>
                                </a>
                                <ul class="dropdown-menu favourites-menu simple pull-right mini-view-list">
                                    <li class="header">My Favourites</li>
                                    <li class="fav-hourlies-count">
                                        <a href="#"><span class="pull-right">0</span> Hourlies</a>
                                    </li>
                                    <li class="fav-people-count">
                                        <a href="#"><span class="pull-right">0</span> People</a>
                                    </li>
                                    <li class="fav-jobs-count">
                                        <a href="#"><span class="pull-right">0</span> Jobs</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown mini-menu-item navNotifications notifications-bell" data-hook="miniMenu">
                                <a title="Notifications" class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="notification-bubble" style="display:none;">0</span>
                                    <i class="fpph fpph-bell"></i>
                                </a>
                                <div class="dropdown-menu notification-menu pull-right">
                                    <h3 class="header">My Notifications</h3>
                                    <div class="notification-list"></div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <?php
                                    $userName = ''; $userImage = $_SESSION['cus_avatar'];
                                    if(!empty($sesObject['user_fname']) && !empty($sesObject['user_lname'])){
                                        $userName = $_SESSION['user_fname'] . ' '. $_SESSION['user_lname'];
                                    }else{
                                        $userName = $_SESSION['user_login'];
                                    }

                                    if(strpos($userImage, 'http') === false){
                                        $userImage = config_item('wp_home_url') . '/' . $_SESSION['cus_avatar'];
                                    }

                                ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="top-nav-image">
                                        <img src="<?= $userImage; ?>" alt="<?= $userName; ?>" class="img-rounded user-avatar">
                                    </div>
					                            <span class="user-greeting crop">Hi <?= $userName; ?>
                                                </span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu user-account-menu simple pull-right">
                                    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                                    <li>
                                        <a class="inline-option" title="Micheal T." rel="nofollow" href="<?php echo base_url( 'user/user/edit'); ?>"><i class="fpph fpph-user"></i>Profile</a>
                                    </li>
                                    <li><a href="#"><i class="fpph fpph-gear"></i>Settings</a></li>
                                    <li><a href="<?php echo base_url( 'user/user/logout?redirect_to='. urlencode('http://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']));?>"><i class="fa fa-power-off"></i>Log out</a></li>
                                    <li><a target="_blank" href="#"><i class="fpph fpph-customer-support"></i>Customer Support</a></li>
                                    <li>
                                        <a rel="nofollow" href="#"><i class="fpph fpph-questionmark-circle"></i>How it works</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div class="pull-right menu-block user-menu">
                        <div class="auth-menu">
                            <a href="<?php echo base_url( 'user/user/signup?redirect_to='. urlencode('http://'. $_SERVER['HTTP_HOST']. $_SERVER["REQUEST_URI"]));?>" title="Sign up" class="text-uppercase sign-up">Đăng ký</a>
                            <a href="<?php echo base_url( 'user/user?redirect_to='. urlencode('http://'. $_SERVER['HTTP_HOST']. $_SERVER["REQUEST_URI"]) );?>" title="Log in" class="text-uppercase login">Đăng nhập</a>
                        </div>
                    </div>
                <?php } ?>
                <div class="pull-right menu-block navigation-menu">
                    <ul>

                        <li class="dropdown">
                            <a class="dropdown-toggle  text-uppercase with-border-on-hover " data-toggle="dropdown" rel="nofollow"  ><i class="fpph-categories color-pph" style="margin-right: 6px;"></i>Có gì hay</a>
                            <ul class="dropdown-menu simple pull-right">
                                <li><a href="#">News</a></li>
                                <li><a href="#">VneTV</a></li>
                                <li><a href="#">Zotadi</a></li>
                                <li><a href="#">VnWorks</a></li>
                                <li><a href="#">VnLand</a></li>
                            </ul>
                        </li>
                        <li class="dropdown separator"><a class="job btn bold" rel="nofollow" data-trigger="post-btn" href="<?php echo base_url( 'user/article/create' );?>">Tạo bài viết</a></li>
                    </ul>
                </div>
            </div>
            <button class="offcanvas-toggle topnav-toggle button visible-xs visible-sm">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="fa fa-times topnav-close"></span>
            </button>

            <div class="nav navbar-collapse">
                <div class="navbar-mobile visible-xs visible-sm">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#home" role="tab" data-toggle="tab"><i class="fa fa-home"></i></a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- BEGIN: Home tab -->
                        <div class="tab-pane active" id="home">
                            <!-- Buy Section-->
                            <section>
                                <header class="row text-uppercase"></header>
                                <ul class="simple">
                                    <li><a href="#">Tạo bài viết</a></li>
                                </ul>
                            </section>
                            <!-- Sell Section-->
                            <section>
                                <header class="row text-uppercase">Có gì hay</header>
                                <ul class="simple">
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">VneTV</a></li>
                                    <li><a href="#">Zotadi</a></li>
                                    <li><a href="#">VnWorks</a></li>
                                    <li><a href="#">VnLand</a></li>
                                </ul>
                            </section>
                            <!-- Help Section -->
                            <section>
                                <header class="row text-uppercase">Help</header>
                                <ul class="simple">
                                    <li>
                                        <a href="<?php echo base_url( 'user/user/signup?redirect_to='. urlencode('http://'. $_SERVER['HTTP_HOST']. $_SERVER["REQUEST_URI"]) );?>">Sign up</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url( 'user/user?redirect_to='. urlencode('http://'. $_SERVER['HTTP_HOST']. $_SERVER["REQUEST_URI"]) );?>">Log in</a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                        <!-- END: Home Tab-->
                    </div>
                </div>
            </div>
        </nav>
    </header>