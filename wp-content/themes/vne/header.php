<!DOCTYPE html>
<!--[if lt IE 8]> <html class="lt-ie10 lt-ie9 lt-ie8 unsupported-browser"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie10 lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>    <html class="lt-ie10 ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="modern-browser" style="margin-top: 0 !important;"> <!--<![endif]-->
	<head>
        <meta charset="UTF-8">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700,800' rel='stylesheet' type='text/css'>
        <meta name="robots" content="noindex" />    
        <title><?php wp_title(''); ?></title>
    <?php if( is_single() ){?>
        <meta name="description" content="<?php echo get_the_excerpt(); ?>"/>
        <meta name="keywords" content="<?php echo get_tag_keyword(); ?>"/>
        <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
        <meta property="og:title" content="<?php echo get_the_title(); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo get_the_permalink(); ?>" />
        <meta property="og:image" content="<?php echo get_bg_image( get_the_ID() ); ?>" />
    <?php } else{?>
        <meta name="description" content="<?php bloginfo('description'); ?>"/>
        <meta name="keywords" content="<?php bloginfo('keyword'); ?>"/>
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css"/>
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    
    <?php wp_head(); ?>
    
    <!--[if lt IE 9]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.min.js"></script>
    <![endif]-->
  </head>
<body class="responsive">

        <div id="site-wrapper" class="site-wrapper">
            <header id="widget-TopNav" class="top-navigation for-guest">
				<nav role="navigation" class="container">
					<div class="navbar-header">
						<a id="logo" class="pph-logo" href="#">PeoplePerHour</a>  
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
						
						<div class="pull-right menu-block user-menu">
							<div class="auth-menu">
								<a href="#" title="Sign up" class="text-uppercase sign-up">Sign up</a>
								<a href="#" title="Log in" class="text-uppercase login">Log in</a>
							</div>
						</div>
						<div class="pull-right menu-block navigation-menu">
							<ul>
								<li class="dropdown">
									<a class="dropdown-toggle text-uppercase with-border-on-hover " data-toggle="dropdown" rel="nofollow" href="#">Buy</a>                
									<ul class="dropdown-menu simple pull-right">
										<li><a href="#">Browse Hourlies</a></li>
										<li><a href="#">Post Job</a></li>
										<li><a href="#">Find Freelancers</a></li>
										<li><a href="#">Discover Skills</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle  text-uppercase with-border-on-hover " data-toggle="dropdown" rel="nofollow" href="#">Sell</a>                
									<ul class="dropdown-menu simple pull-right">
										<li><a href="#">Browse Jobs</a></li>
										<li><a href="#">Post Hourlie</a></li>
										<li><a href="#">Promote Yourself</a></li>
									</ul>
								</li>            
								<li class="dropdown separator"><a class="job btn bold" rel="nofollow" data-trigger="post-btn" href="#">Post Job</a></li>        
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
								<header class="row text-uppercase">Buy</header>
								<ul class="simple">
									<li><a href="#">Browse Hourlies</a></li>
									<li><a href="#">Post Job</a></li>
									<li><a href="#">Find Freelancers</a></li>
									<li><a href="#">Discover Skills</a></li>
								</ul>
							</section>
							<!-- Sell Section-->
							<section>
								<header class="row text-uppercase">Sell</header>
								<ul class="simple">
									<li><a href="#">Browse Jobs</a></li>
									<li><a href="#">Post Hourlie</a></li>
									<li><a href="#">Promote Yourself</a></li>
								</ul>
							</section>
							<!-- Help Section -->
							<section>
								<header class="row text-uppercase">Help</header>
								<ul class="simple">
									<li><a target="_blank" href="#">Customer Support</a></li>
									<li>
										<a rel="nofollow" href="#">How it works</a>                
									</li>
									<li>
										<a href="#">Sign up</a>                
									</li>
									<li>
										<a href="#">Log in</a>               
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