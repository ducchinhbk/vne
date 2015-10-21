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

<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-left with-left-sidebar">
    
    <div class="main-content controller-hourlie action-list" style="width: 100%;">
        <section class="listings-container hourlies-listing-container" id="hourlies-listing">
            <div class="bg-fill clearfix options-container">
                <header class="clear">
                    <h1 id="hourlies-listing-heading">
                        Bộ sưu tập nổi bật
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
                                        $full_name = get_user_meta( get_the_author_ID(), 'first_name', true ).' '.get_user_meta( get_the_author_ID(), 'last_name', true );
                                        ?>
                       
                                        <div class="col-xs-12 col-sm-4 col-md-3 hourlie-tile-container">
                                            <div class="clearfix hourlie-tile js-listing-tile  with-member-info">
                                                <div class="image-container">
                                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="">
                                                        <?php the_post_thumbnail(array(260, 195)); ?>         
                                                    </a>
                                                    <div class="stats-container clearfix">
                                                        <div class="pull-left rating">
                                                            <i class="fpph fpph-thumb-up"></i>
                                                            <span>Vote:</span>
                                                            <span class="rating-value">99</span>
                                                        </div>
                                                        <div class="pull-right sales">
                                                            <i class="fpph fpph-buyer-activity"></i>
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
                                                            <a title="<?php echo $full_name; ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                                                <?php echo c_get_avatar(get_the_author_ID(), 30, 30, "user-avatar user-avatar-sm user-avatar-square");?>
                                                            </a>
                                                        </div>
                                                        <div class="user-info pull-left">
                                                            <a class="clearfix user-name crop" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo $full_name; ?>" ><?php echo $full_name; ?></a>
                                                            <span class="user-country clearfix crop"><?php echo $cur_user->cus_city; ?></span>
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
    left: 5px;
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
    left: 105px;
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
    padding: 7px 0 7px 7px;
    color: #5F5A5A;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    font-size: 12px;
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