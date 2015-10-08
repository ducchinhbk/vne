<?php
/**
 * The template for displaying author page.
 *
 * @file      author.php
 * @package   VnEconomist news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header(); ?>

<?php 

    $cur_user = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    $full_name = get_user_meta( $cur_user->ID, 'first_name', true ).' '.get_user_meta( $cur_user->ID, 'last_name', true );
  
?>
<div class="main-content full-width controller-member action-profile no-padding">
        
    <div class="clearfix profile-header profile-header-cover">
        <div class="profile-background col-xs-12 hidden-xs no-padding">
            <div class="background-wrapper">
                <div style="background-image: url(<?php echo esc_url(site_url($cur_user->cus_cover)); ?>);" class="memberImage"></div>
            </div>
        </div>
    <div class="profile-header-fav">
        <div class="fav-triangle">

        </div>
        <div class="fav-icon">
            <div class="widget-star-item " style="display: inline-block; margin-top: 0;">
            <a  href="#"><span></span></a>
            </div>        
        </div>
    </div>
    <div class="profile-header-xs visible-xs-block hidden-sm">
        <div class="profile-availability">
            <i class="js-tooltip status-icon fa fa-circle green"></i>        
        </div>

        <div class="profile-pic">
            <img src="<?php echo esc_url(site_url($cur_user->cus_avatar)); ?>" alt="<?php echo $full_name;?>"/>            
            <span class="hidden-xs available  js-tooltip" title="Savitri D. is available to start working for you immediately">
                <i class="icon fa fa-check"></i>
            </span>
        </div>
        
        <div class="profile-cert">
            <span class="cert cert-level5-medium " data-level="5" data-tooltip-content="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" title="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge.">
            </span>        
        </div>
        <div class="clearfix member-info">
            <span class="member-name">
                <?php echo $full_name;?>           
            </span>
            <span class="member-description">
                <?php echo $cur_user->cus_career.', '.$cur_user->cus_company;?>            
            </span>

        </div>
        <div class="member-location-rate">
            <ul>
                <li>
                    <i class="fpph fpph-location"></i>
                    <?php echo $cur_user->cus_city; ?>                
                </li>
                <li>
                    <i class="fpph fpph-seller-activity"></i>
                    $44 /hr               
                </li>
            </ul>
            <div class="member-available">
                <ul>
                    <li>
                        <i class="status-icon fa fa-check-circle green js-tooltip" title="Savitri D. is available to start working for you immediately"></i>
                        <span class="status-label-text">Available now</span>                    
                    </li>
                </ul>
            </div>
        </div>
        <div class="member-about clearfix">
            <div class="member-status text-center">
                <q class="crop full-width-q" title="<?php echo $cur_user->cus_quote;?>" ><?php echo $cur_user->cus_quote;?></q>            
            </div>
            <hr class="clearfix"/>
            <div class="about-container js-about-container">
                <p>
                <?php echo get_sub_string($cur_user->cus_description, 25); ?>
                <a class="call-to-action about-read-more about-dialog-trigger" >xem thêm...</a>
               </p>
            </div>        
        </div>
                                
        <div class="member-hire">
            <span><a class="btn contact-member call-to-action btn-inverted " rel="nofollow" href="#">Contact</a></span>        
        </div>
    </div>
    <div class="profile-header-member hidden-xs">
        <div class="profile-pic">
            <img src="<?php echo esc_url(site_url($cur_user->cus_avatar)); ?>" alt="<?php echo $full_name;?>"/>            
            <span class="hidden-xs available  js-tooltip" title="" data-original-title="Savitri D. is available to start working for you immediately">
                <i class="icon fa fa-check"></i>
            </span>
        </div>
        <div class="seller-name light">
            <h1>
                <?php echo $full_name;?>               
                <aside>
                    <?php echo $cur_user->cus_career.', '.$cur_user->cus_company;?>                
                </aside>
            </h1>
        </div>
    </div>
    <div class="profile-header-right-col align-center hidden-xs">
        <div class="cert-container">
            <span class="cert cert-level5-xlarge " data-level="5" data-tooltip-content="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" title="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge.">
            </span>        
        </div>
        <span><a class="btn contact-member call-to-action btn-inverted " rel="nofollow" href="#">Contact</a></span>    
    </div>
</div>
<div class="member-info-container">
    <div class="col-xs-12 col-sm-4 col-lg-3 profile-sidebar hidden-xs">
        <div class="sidebar-box clearfix hidden-xs">
            <div class="member-status">
                <q class="crop full-width-q" title="<?php echo $cur_user->cus_quote;?>"><?php echo $cur_user->cus_quote;?></q>    
            </div>
            <hr/>
            <p>
            </p>
            <div class="about-container js-about-container">
                <p>
                    <?php echo get_sub_string($cur_user->cus_description, 25); ?>
                    <a class="call-to-action about-read-more about-dialog-trigger" >xem thêm...</a>
                    
                </p>
            </div>    
            <div class="clearfix">
                <ul class="clearfix details-list">
                     <li>
                        <i class="fpph fpph-location"></i>
                        <?php echo $cur_user->cus_city; ?>           
                    </li>
                    <li class="">
                        <i class="status-icon fa fa-check-circle green js-tooltip" title="Savitri D. is available to start working for you immediately"></i>
                        <span class="status-label-text">Available now</span>            
                    </li>
                    <li>
                        <i class="js-tooltip status-icon fa fa-circle green"></i>
                        <span class="status-label-text">Online now</span>            
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="clearfix sidebar-box gutter-top hidden-xs">
            <h3 class="bubble">Skills</h3>
            <div class="clearfix widget-tag-list">
                <a class="tag-item small" href="#">Academic writing</a>
                <a class="tag-item small" href="#">Dissertation writing</a>
                <a class="tag-item small" href="#">Research writing</a>
                <a class="tag-item small" href="#">Article</a>
                <a class="tag-item small" href="#">Reviews writing</a>
                <a class="tag-item small" href="#">Fitness writing</a>
                <a class="tag-item small" href="#">Health writing</a>
                <a class="tag-item small" href="#">Medical writing</a>
                <a class="tag-item small" href="#">EBook writing</a>
                <a class="tag-item small" href="#">Biostatistics</a>        
                <a href="#" class="tag-item js-show-more-tags">
                    <span class="call-to-action">+2</span>
                </a>
                <div class="js-more-tags" style="display: none;">
                    <a class="tag-item small" href="#">Quantitative analysis</a>
                    <a class="tag-item small" href="#">Statistics</a>        
                </div>
            </div>
        </div>
        
        <div class="member-summary">
            <div class="clearfix gutter-top">
                <div class="lifted-corners with-handles">
                    <div class="handles"></div>
                    <div class="all-badges-container">
                        <div class="cert-badge">
                            <span class="cert cert-level5-medium " data-level="5"></span>
                        </div>
                        <div class="widget-member-prizes">
                            <img class="prize" title="Top Endorsed" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/prizes/badges/ffdd1b856a16c89191f1150e4430076b.png" alt="Top Endorsed"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="member-certificates"></div>
    </div>
    <div class="col-xs-12 col-sm-8 col-lg-9 profile-main">
        <div id="members-widget-hourlies-portfolio" class="member-tabs pph-default stretch gutter-bottom hidden-xs">
            <ul role="tablist" class="nav nav-tabs">
                <li class="active"><a role="tab" data-toggle="tab" href="#my-hourlies">Bài viết đã chia sẽ (8)</a></li>
            </ul>
            <div class="tab-content">
                <div id="my-hourlies" class="tab-pane fade in active">
                <div id="" class="clearfix">
                    <div class="col-xs-12">
                        <a class="my-hourlies-viewall call-to-action right" style="margin-bottom: 20px;"></a>
                    </div>
                    <!-- The Loop -->

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                       
                        <div class="col-xs-12 col-sm-6 col-md-4 hourlie-tile-container">
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
                                            <a  title="<?php echo $full_name; ?>">
                                                <img class="user-avatar user-avatar-xs"  alt="<?php echo $full_name; ?>" src="<?php echo esc_url(site_url($cur_user->cus_avatar)); ?>"/>
                                            </a>
                                        </div>
                                        <div class="user-info pull-left">
                                            <a  title="<?php echo $full_name; ?>" class="clearfix user-name crop"><?php echo $full_name; ?></a>
                                            <span class="user-country clearfix crop"><?php echo $cur_user->cus_city; ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="col-xs-4 price-container price-tag text-right" style="font-size: 12px;line-height: 2.5;">
                                        <span>30</span><sup> votes</sup>              
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; else: ?>
                        <p><?php _e('Không có bài viết hiển thị..'); ?></p>
                
                    <?php endif; ?>
                
                <!-- End Loop -->
                    
                    
                    <div class="clearfix"></div>
                    <div class="pager" style="margin-top: 20px;">
							<div class="pagination clearfix">
								<ul data-responsive="1" role="navigation" id="hourlies-listing-pager" class="yiiPager">
									<li class="hidden-xs"><span class="inactive"><i class="fa fa-angle-left"></i></span></li>
									<li class=""><a data-page="1" class=" selected" title="go to page 1" href="#">1</a></li>
									<li class="hidden-xs"><a data-page="2" class="" title="go to page 2" href="#">2</a></li>
									<li class="hidden-xs"><a data-page="3" class="" title="go to page 3" href="#">3</a></li>
									<li class="hidden-xs"><a data-page="4" class="" title="go to page 4" href="#">4</a></li>
									
									<li class=""><a data-page="2" class="next" title="" href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
							</div>
						</div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group visible-xs tab-collapsed" id="members-widget-hourlies-portfolio-accordion"></div>	        	    </div>
	    
</div>
   
</div>



<div class="bootbox modal fade in"  style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="bootbox-close-button close">×</button>
                    <h4 class="modal-title">Về <?php echo $full_name; ?></h4>
            </div>
            <div class="modal-body">
                <div class="bootbox-body">
                    <?php echo $cur_user->cus_description; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
       $('.about-dialog-trigger').click(function(){
            $('.bootbox').toggle();
            $('.bootbox-close-button').click(function(){
                $('.bootbox').fadeOut();
            });
       }) 
    });
</script>

<?php get_footer();?>