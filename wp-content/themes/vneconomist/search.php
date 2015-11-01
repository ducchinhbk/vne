<?php
/**
 * The template for displaying searh page.
 *
 * @file      search.php
 * @package   VnUp news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>
 <?php $search_query = get_search_query(); ?>
<div class="container container-top"></div>


<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-left with-left-sidebar">
    
    <div class="main-content controller-hourlie action-list" style="width: 100%;">
        <section class="listings-container hourlies-listing-container" id="hourlies-listing">
             <?php if ( have_posts() ) { 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; global $wp_query;
                ?>
            <div class="bg-fill clearfix options-container">
                <header class="clear">
                    <h1 id="hourlies-listing-heading">
                        Kết quả tìm kiếm cho: <span class="keyword"> "<?php echo $search_query ?>"</span>
                    </h1>
                </header>
                        
            </div>
            <div class="results grid" id="hourlies-listing-results">
                <div id="hourlies-listing-listview" class="list-view">
                    <div class="items clearfix items-results ">
                    
                     <!-- The Loop -->
                        <?php
    						while ( have_posts() ) {
    							the_post();
                                $full_name = get_user_meta( get_the_author_ID(), 'first_name', true ).' '.get_user_meta( get_the_author_ID(), 'last_name', true );
                                $user_city = get_user_data_field('cus_city', get_the_author_ID());
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
                                                        <?php echo c_get_avatar(get_the_author_ID());?>
                                                    </a>
                                                </div>
                                                <div class="user-info pull-left">
                                                    <a class="clearfix user-name crop" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo $full_name; ?>" ><?php echo $full_name; ?></a>
                                                    <span class="user-country clearfix crop"><?php echo $user_city['cus_city']; ?></span>
                                                </div>
                                                        
                                            </div>
                                            <div class="col-xs-4 price-container price-tag text-right" style="font-size: 12px;line-height: 2.5;">
                                                <span>30</span><sup> votes</sup>              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        
                        <!-- End Loop -->
                   
                    </div>
                    
                    <div class="pager">
							<div class="pagination clearfix">
								<?php if($wp_query->max_num_pages > 1){ 
                                    if( $wp_query->max_num_pages > 10 ){
                                                                
                                        $limit = $paged + 10;
                                        $limit = ( $limit > $wp_query->max_num_pages)? $wp_query->max_num_pages: $limit;
                                        $start = ( $paged >= 3)? ($paged - 2): $paged;
                                        
                                    } else{
                                    $limit = $wp_query->max_num_pages;
                                    $start = 1;
                                }
                                ?>
								<ul data-responsive="1" role="navigation" id="hourlies-listing-pager" class="yiiPager">
                                    <?php
                                        if ($paged > 1) { ?>
                                        <li class=""><a href="<?php echo esc_url(home_url()).'?paged=' . ($paged - 1).'&s='.str_replace(' ','+', get_search_query());?>" data-page="<?php echo ($paged - 1);?>" class="previous" title="Trang trước" ><i class="fa fa-angle-left"></i></a></li>
                                    <?php }
                                    for( $i= $start; $i <= $limit; $i++){ ?>
									
									<li class="hidden-xs"><a href="<?php echo esc_url(home_url()).'?paged=' . $i.'&s='.str_replace(' ','+', get_search_query()); ?>" data-page="<?php echo $i;?>" class="<?php echo ($paged == $i)? "selected": ""; ?>" title="Trang <?php echo $i;?>" ><?php echo $i;?></a></li>
									<?php }
                                    if($paged < $wp_query->max_num_pages){ ?>
                                        <li class=""><a href="<?php echo esc_url(home_url()).'?paged=' . ($paged + 1).'&s='.str_replace(' ','+', get_search_query());?>" data-page="<?php echo ($paged + 1);?>" class="next" title="Trang tiếp theo" ><i class="fa fa-angle-right"></i></a></li>
								    <?php } ?>
                                </ul>
                                <?php } ?> 
							</div>
						</div>
   
                </div>    
            </div>
            <?php } else { ?>
                <p><?php _e('Không có bài viết hiển thị..'); ?></p>
                        
            <?php } ?>
        </section>
    </div>
</div>
<?php get_footer();?>