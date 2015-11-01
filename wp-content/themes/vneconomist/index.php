<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   VnUp news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header(); ?>

<div class="container container-top"></div>

<!-- BEGIN: Home Page -->
<div id="home-page" class="home-container clearfix fullheight">
    <!-- BEGIN: Carousel section -->
    <section class="section-home section-carousel clearfix">
        <div id="home-slider" class="carousel slide do-fade" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden-xs">
                <li data-target="#home-slider" data-slide-to="0" class="active">
                <li data-target="#home-slider" data-slide-to="1" class="">
                <li data-target="#home-slider" data-slide-to="2" class="">   
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill slide-01"></div>
                    <div class="carousel-caption">
                        <div class="caption-header">Write to make better</div>
                        <div class="caption-text">Super fast with Guaranteed Results</div>            
                    </div>
                </div>
                <div class="item">
                    <div class="fill slide-02"></div>
                    <div class="carousel-caption">
                        <div class="caption-header">Build your personal brand</div>
                        <div class="caption-text">Super fast with Guaranteed Results</div>           
                    </div>
                </div>
                <div class="item">
                    <div class="fill slide-03"></div>
                    <div class="carousel-caption">
                        <div class="caption-header">And Everything In-Between</div>
                        <div class="caption-text">Super fast with Guaranteed Results</div>           
                    </div>
                </div>
            </div>
    
            <!-- Controls -->
            <a class="left carousel-control hide" href="#home-slider" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="right carousel-control hide" href="#home-slider" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>
        </div>
        <div class="get-started-form">
            <div class="container clearfix">
                <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 no-padding-left no-padding-right clearfix">
                    <form class="clearfix" id="get-started" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
                        
                        <div class="col-sm-10 no-padding-left">
                            <input placeholder="Nhập từ khóa tìm kiếm.." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="search-input" type="text" maxlength="85" />
                        </div>
                        <div class="col-sm-2 no-padding-left">
                            <input class="btn call-to-action btn-inverted" type="submit"  value="Let&#039;s Go ›" />
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </section>
    <!-- END: Carousel section -->
</div>
    <div id="colection-wrapper" class="colection-wrapper">
      <div class="container container">
          <div class="col-md-12 col-lg-12 ta-center">
            <div class="hp-collection hp-tour-in">
              <div class="section-title container section-title-thin ta-center">Bộ sưu tập bài viết nổi bật</div>
              <div class="row">
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                  <a href="#" title="Top Restaurants in Delhi NCR">
                    <h4 class="collections-title" > 
                        <span class="collections-title_outlets">30 Places</span> 
                        <span class="collections-title_text">Trending this Week</span> 
                    </h4>
                    <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/e40960514831cb9b74c552d69eceee0f_1418387628_l.jpg');">
                        <div class="collection-overlay"></div>
                    </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best New Restaurants in Delhi NCR">
                        <h4 class="collections-title"> 
                            <span class="collections-title_outlets">22 Places</span> 
                            <span class="collections-title_text">Newly Opened</span> 
                        </h4>
                        <div class="collection-box-bg lazy" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/dc347fcba38a39000ab7ab50f0f222ad_1424059541_l.jpg');">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Cafe Breakfast in Delhi NCR">
                        <h4 class="collections-title" > 
                            <span class="collections-title_outlets">18 Places</span> 
                            <span class="collections-title_text">Cafe Breakfast</span> 
                        </h4>
                        <div class="collection-box-bg lazy" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/fb1dfaf63322c68558b27ed7e5dc6e9c_1418401086_l.jpg');">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Microbreweries in Delhi NCR">
                    <h4 class="collections-title" > 
                        <span class="collections-title_outlets">14 Places</span> 
                        <span class="collections-title_text">Microbreweries</span> 
                    </h4>
                    <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/0707137915a22b40b4d5e8274f47d791_1419918315_l.jpg');">
                        <div class="collection-overlay"></div>
                    </div>
                    </a> </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Coffee in Delhi NCR">
                        <h4 class="collections-title"> 
                            <span class="collections-title_outlets">19 Places</span> 
                            <span class="collections-title_text">Great Coffee</span> 
                        </h4>
                        <div class="collection-box-bg lazy" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/95d517d48c52188721ddfcf69d7d34f5_1419406534_l.jpg');">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Outdoor Dining in Delhi NCR">
                    <h4 class="collections-title" > 
                        <span class="collections-title_outlets">19 Places</span> 
                        <span class="collections-title_text">Outdoor Seating</span> 
                    </h4>
                    <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/4c2b30d63f25fc4d52a220890442421a_1421300685_l.jpg'); ">
                    <div class="collection-overlay"></div>
                  </div>
                    </a> </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Healthy Breakfast in Delhi NCR">
                    <h4 class="collections-title" > 
                        <span class="collections-title_outlets">10 Places</span> 
                        <span class="collections-title_text">Healthy Breakfast</span> 
                    </h4>
                    <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/b762edbc2f8303b0ffdbdaa2ed6287a6_1424180016_l.jpg'); ">
                    <div class="collection-overlay"></div>
                  </div>
                    </a> </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Breakfast Buffets in Delhi NCR">
                        <h4 class="collections-title" > 
                            <span class="collections-title_outlets">19 Places</span> 
                            <span class="collections-title_text">Breakfast Buffets</span> 
                        </h4>
                        <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/d5e7778988c8df486127982a097b7ba5_1418401323_l.jpg'); ">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Cheesecakes in Delhi NCR">
                    <h4 class="collections-title" > 
                        <span class="collections-title_outlets">18 Places</span> 
                        <span class="collections-title_text">Great Cheesecakes</span> 
                    </h4>
                    <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/e359a2a24366b32acfe905ee084f4206_1418629602_l.jpg'); ">
                        <div class="collection-overlay"></div>
                    </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Cheap Breakfast in Delhi NCR">
                        <h4 class="collections-title"> 
                            <span class="collections-title_outlets">19 Places</span> 
                            <span class="collections-title_text">Pocket Friendly Breakfast</span> 
                        </h4>
                        <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/81fbcaec4c83f321c854a0fdc9dcfdfd_1422002949_l.jpg'); ">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Street Food in Delhi NCR">
                        <h4 class="collections-title" > 
                            <span class="collections-title_outlets">18 Places</span> 
                            <span class="collections-title_text">Street Food</span> 
                        </h4>
                        <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/6a5f59d28b2e695b15e7029643e4ca27_1418391059_l.jpg'); ">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col-lg-3 col-md-6 collection-item">
                  <div class="collection-box collection-box-snippet"> 
                    <a href="#" title="Best Butter Chicken in Delhi NCR">
                        <h4 class="collections-title" > 
                            <span class="collections-title_outlets">19 Places</span> 
                            <span class="collections-title_text">Butter Chicken</span> 
                        </h4>
                        <div class="collection-box-bg lazy"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/7d78f516cf561c362481f1d7a1fc7464_1418393872_l.jpg'); ">
                            <div class="collection-overlay"></div>
                        </div>
                    </a> 
                  </div>
                  <div class="clear"></div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12 ta-center mtop"> 
                <a class="btn call-to-action btn-inverted hp-collection-load" href="#">Xem thêm</a> 
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-left with-left-sidebar">
    
    <div class="main-content controller-hourlie action-list" style="width: 100%;">
        <section class="listings-container hourlies-listing-container" id="hourlies-listing">
            <div class="bg-fill clearfix options-container">
                <header class="clear">
                    <h1 id="hourlies-listing-heading">
                        Bài viết mới 
                    </h1>
                </header>
                        
            </div>
            <div class="results grid" id="hourlies-listing-results">
                <div id="hourlies-listing-listview" class="list-view">
                    <div class="items clearfix items-results ">
                    
                     <!-- The Loop -->

                        <?php   
                            $args = array(
                                'posts_per_page' => 16
                            );
                            $the_query = new WP_Query($args);
                            if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        $user_info = get_userdata(get_the_author_ID()); 
                                        //var_dump($user_info); exit;
                                        $full_name = $user_info->first_name.' '.$user_info->last_name;
                                        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                                        $avatar_url =  site_url( $user_info->cus_avatar );
                                        //echo $avatar_url; exit;
                                        ?>
                       
                                        <div class="col-xs-12 col-sm-4 col-md-3 hourlie-tile-container">
                                            <div class="clearfix hourlie-tile js-listing-tile  with-member-info">
                                                <div class="image-container">
                                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="">
                                                         
                                                        <img width="253" height="195" src="<?php echo c_crop_image_resize($url, 253, 195, true); ?> " class="attachment-253x195 wp-post-image" alt="Capture"/>       
                                                    </a>
                                                    <div class="stats-container clearfix">
                                                        <div class="pull-left rating">
                                                            <i class="fpph fpph-thumb-up"></i>
                                                            <span>Vote:</span>
                                                            <span class="rating-value">99</span>
                                                        </div>
                                                        <div class="pull-right sales">
                                                            <span class="fpph fpph-user"></span>
                                                            <span>View:</span>
                                                            <span class="sales-value">1999</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="title-container">
                                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="color-hourlie js-paragraph-crop" style="word-wrap: break-word;">
                                                        <?php the_title(); ?>           
                                                    </a>
                                                </div>
                                                <div class="profile-container stretch clearfix">
                                                    <div class="col-xs-8 no-padding-right">
                                                        <div class="user-image-container pull-left">
                                                            <a title="<?php echo $full_name; ?>" href="<?php echo site_url( '/c/user/personal/'. $user_info->user_login);?>">
                                                                <img class="user-avatar user-avatar-sm user-avatar-square'" src="<?php  echo c_crop_image_resize($avatar_url, 30, 30, true)?>" alt="" width="30" height="30"/>
                                                               
                                                            </a>
                                                        </div>
                                                        <div class="user-info pull-left">
                                                            <a class="clearfix user-name crop" href="<?php echo site_url( '/c/user/personal/'. $user_info->user_login);?>" title="<?php echo $full_name; ?>" ><?php echo $full_name; ?></a>
                                                            <span class="user-country clearfix crop"><?php echo $user_info->cus_city; ?></span>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-xs-4 price-container price-tag text-right" style="font-size: 12px;line-height: 2.5;">
                                                        <span>30</span><sup> votes</sup>              
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php } } else { ?>
                                <p><?php _e('Không có bài viết hiển thị..'); ?></p>
                        
                            <?php } ?>
                        
                        <!-- End Loop -->
                   
                    </div>
   
                </div>    
            </div>
        </section>
    </div>
</div>

<style>
#navigation_toolbox{
    display: none ;
    position: fixed;
    bottom: 45px;
    right: 0;
    width: 110px;
    background: #fff;
    box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0,0,0,0.1);
    font-size: 0.9em;
    z-index: 99;
}
#navigation_toolbox ul{
    list-style: none;
    padding: 10px 2px;
}

#navigation_toolbox .sub-menu{
    display: none;
    position: absolute;
    right: 105px;
    margin-top: -34px;
    background: #fff;
    box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0,0,0,0.1);
    border-left: none;
    padding: 0 20px;
}
#navigation_toolbox .sub-menu li a{
    border-bottom: none;
}
#navigation_toolbox li a {
    display: block;
    width: 100%;
    height: 100%;
    padding: 7px 0;
    color: #5F5A5A;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    font-size: 12px;
    text-align: center;
    font-weight: bold;
    border-bottom: 1px dotted #ddd;
}
#navigation_toolbox li a:hover{
	color: #cc3300;
}
#navigation_toolbox li:last-child a{
   border-bottom: none; 
}
#navigation_toolbox li:hover > .sub-menu{
    display: block;
} 
#navigation_toolbox li .sub-menu li a{
    color: #000 !important;
}
#navigation_toolbox li .sub-menu li a:hover {
    color: #E66E46 !important;
}
#navigation_toolbox #menu-category-menu .current-menu-item{
    background-color: #E66E46;
    color: #fff;
}
#navigation_toolbox #menu-category-menu .current-menu-item a{
    color: #fff;
}
</style>
<div id="navigation_toolbox">
    
    <?php
    wp_nav_menu(array(
	   'menu' => 'Category Menu',
	   'menu_class' => 'menu-list',
	   'container' => false,
    ));
    ?>
 </div>
 
 <script>
 
    $(window).scroll(function() {

     if ($(this).scrollTop()> 200)
     { 
        $('#navigation_toolbox').show();
        $('#secondary-bar').addClass('menu-fixed');
     }
     else
     {
      $('#navigation_toolbox').hide();
      $('#secondary-bar').removeClass('menu-fixed');
     }
 });
 </script>
<?php get_footer();?>