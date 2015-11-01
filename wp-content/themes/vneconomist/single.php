<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   VnEconomist news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>
<?php 
    $category = get_the_category(); $cat_ID = ($category[0]->category_parent > 0)? $category[0]->category_parent : $category[0]->term_id; 
    
?>
<style>
    .controller-job.action-view header h1{
        border-bottom: none;
    }
    .user-voted{background-color: #999 !important;border: none !important; text-shadow: none !important;}
    .user-voted:hover{color: #fff !important;}
</style>
<div class="container container-top"></div>
	<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-right">
		<div class="main-content controller-hourlie controller-job action-view controller-member action-contact">
       <?php if (have_posts()) { ?>		
             <?php while (have_posts()) : the_post();
                     $author_id = get_the_author_ID();
                     
                     $user_info = get_userdata($author_id); 
                     $full_name = get_user_meta( $author_id, 'first_name', true ).' '.get_user_meta( $author_id, 'last_name', true );
                    
             ?>
			<header class="clearfix featured featured-right">
				<h1 class="clearfix"> <?php the_title()?> </h1>
			</header>
			
			
			<div class="col-xs-12 clearfix js-auto-pause-hidden hourlie-description-text">
				<?php the_content(); ?>	
			</div>
                <?php addPostMetaValue(get_the_ID(), 'post_views_count', 1);  endwhile; ?> 
            <?php } else { ?>
        		  <div class="col-xs-12 clearfix js-auto-pause-hidden hourlie-description-text">
        				<h1 class="single-title" >Không có thông tin để hiển thị</h1>					
			     </div>
                        			
 		     <?php } ?> 
			<div class="js-auto-pause-hidden" >
				<div class="widget-order-hourlie-addons clearfix">
					<div class="title-container">
						<h2 class="col-xs-12 clearfix prepend-top">Bộ sưu tập liên quan</h2>
					</div>
				
				    <div  class="content-text clear addons-container" data-hook="addons-container">
				        <ul class="addons clearfix boxmodelfix">
								
				        </ul>
				        <br class="clear"/>
				    </div>
				</div>
			</div>
            <?php if(isset($_SESSION['wp_user_data'])){?>
            
            <div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-1 member"></div>
                <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10 col-lg-pull-1 contact">
                    <div class="hire-form-container clearfix">
                        <div>
        					<form enctype="multipart/form-data" id="member-contact-form" action="#" method="post">
        						<div class="row">
        							<div class="col-xs-12 form-group">
        								<div class="instant-hire clearfix">
        									<div class="fields clearfix">
        										
        										<div class="clearfix payment-contracts">
                                                    <h2>Đánh giá của bạn</h2>
        											<div class="row">
        												<ul id="rating">
        													<li><a href="javascript:void(0)">1.0</a></li>
        													<li><a href="javascript:void(0)">1.5</a></li>
        													<li><a href="javascript:void(0)">2.0</a></li>
        													<li><a href="javascript:void(0)">2.5</a></li>
        													<li><a href="javascript:void(0)">3.0</a></li>
        													<li><a href="javascript:void(0)">3.5</a></li>
        													<li><a href="javascript:void(0)">4.0</a></li>
        													<li><a href="javascript:void(0)">4.5</a></li>
        													<li><a href="javascript:void(0)">5.0</a></li>
        												</ul>
        												<input type="hidden" id="rating-index" name="rating_index" value=""/>
        											</div>
        
        										</div>
        									</div>
        								</div>
        								<div class="textbox new-job hourlie clearfix">
        									<textarea id="commnent-content" placeholder="Chia sẽ suy nghĩ của bạn về bài viết.." class="col-xs-12" name="comment_content" ></textarea>            
        									
        								</div> 
        								<input type="hidden" name="user_id" id="user-id" value="<?php echo (!empty($_SESSION["wp_user_data"]))? $_SESSION["wp_user_data"]['user_id']: '1'?>"/>
                                        <input type="hidden" name="post_id" id="post-id" value="<?php echo get_the_ID();?>"/>
        							</div>
        						</div>
        
        
        						<div class="form-group submit-btn clearfix gutter-top new-job hourlie">
        							<input id="review-form" class="tall btn btn-inverted call-to-action col-xs-12 col-sm-6 col-md-4 col-lg-2" type="button" name="yt0" value="Gửi bình luận"  style="padding: 7px 0;font-size: 12px;"/>
        						</div>
        						<div class="js-invite-more-sellers"></div>
        
        					</form>
        				</div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <section class="proposal-form prepend-top" data-hook="proposal-form" id="login-box">
                <!--h2 class="bubble">Votes </h2-->
                <div class="inactive-proposal gutter-top text-center">
                    <p>Đăng nhập để vote cho tác giả hoặc bình luận bài viết.</p>
                    <a  class="extra-tall call-to-action btn btn-inverted" href="<?php echo site_url( '/c/user/user?redirect_to='. urlencode(site_url($wp->request)) );?>">Đăng nhập </a>
                </div>    
            </section>
            <?php } ?>
			<div class="col-xs-12 js-auto-pause-hidden hourlie-description-text">
		          
				<div class="feedbacks-container clear prepend-top">
					<div class="feedbacks-list-container">
						<h2 class="prepend-top reviews clearfix">
							Bình luận (<?php echo count_comment( get_the_ID() ); ?>) </h2>
						<section id="feedack-230890" class="timeline clear review-list" data-hook="feedack-container">
							<div id="reviews-list" class="list-view">
                            
								<ul class="items row" id="comments-list">
    								<?php (count_comment( get_the_ID() ) > 0 )? cus_get_comments(get_the_ID()): ''; ?>
                                    
    							</ul>
						</div>            
					</section>
				</div>
                <?php if(count_comment( get_the_ID() ) > 0 ) {?>
                <div class="feedback-toggle-container clearfix" style="margin-top: 30px;">
				    <button class="btn tall call-to-action col-xs-12 col-md-6 col-md-offset-3" id="load-reviews">
							Xem bình luận 
                    </button>
				</div>
                <?php } ?>
			</div>
		</div>
    </div>
    <aside class="right-column sidebar-hourlie-view offcanvas-sidebar">
        <div class="js-keep-in-view-marker"></div>
		<div class="clearfix js-keep-in-view hidden-xs hidden-sm cta-container">
			<div class="clearfix">
				<div class="price-container text-center gutter-top">
					<span class="js-hourlie-discounted-price discounted-price" > <span id="sum-voted" class="sum-voted" style="font-weight: 600; color: #ff6a26;"><?php echo get_sum_voted($author_id);  ?></span> votes  </span>
				</div>
			</div>
			<div class="clear append-bottom hidden-sm hidden-xs"></div>
			<div class="clearfix actions-container">
				<div class="btn-container">
					<div class="clearfix">
					
						<div class="col-xs-8 no-padding-right">
                            <?php if(isset($_SESSION['wp_user_data'])){ 
                                     if(check_voted($user_info->ID, $_SESSION['wp_user_data']["user_id"], get_the_ID())){?>
                                    <span class="hourlie tall btn btn-inverted js-payment-button user-voted" > Đã vote</span>
                                <?php } else { ?>
                                    <span class="hourlie tall btn btn-inverted js-payment-button" id="voting"> Vote</span>
                                <?php }
                                 } else {?>
                            
                                <a href="#login-box" class="hourlie tall btn btn-inverted js-payment-button"> Vote</a>
                            <?php } ?>    
                            <input type="hidden" name="author_id" id="author-id" value="<?php echo $author_id;?>"/>       
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix main-information">
				<div class="no-padding-left col-xs-6">
					<span class="icon-container">
						<i class="fpph fpph-clock-wall"></i>
					</span>
					<span>
						<span>Bình luận</span><br/>
						<span class="value js-delivery-days">25</span>
					</span>
				</div>
				<div class="col-xs-6 no-padding-left no-padding-right">
					<span class="icon-container">
						<i class="fpph fpph-thumb-up"></i>
					</span>
					<span>
						<span class="value">98%</span> Rating<br/>
						<span>(25 reviews)</span>
					</span>
				</div>
			</div>
			
		</div>
		<div class="clearfix member-summary widget-memberSummary">
			<div class=" summary member-summary-section clearfix">
				<div class="member-image-container">
					<?php echo c_get_avatar(get_the_author_ID(), 150, 250, "img-border-round member-image");?>
				</div>
				<div class="member-information-container">
					<div class="member-name-container crop">
						<h2>
							<a class="crop member-short-name" title="<?php echo $full_name; ?>" rel="nofollow" href="<?php echo site_url( '/c/user/personal/'. $user_info->user_login);?>"><?php echo $full_name; ?></a>
							<span class="icon member-online offline"></span>
						</h2>
						<div class="member-job-title crop"><?php echo $user_info->cus_career.', '.$user_info->cus_company;?> </div>
					</div>
				</div>
				<div class="cert-container text-right">
					<span class="cert cert-level4-medium " data-level="4" data-tooltip-content="CERT is PPH&#039;s  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" title="CERT is PPH&#039;s  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge.">
					</span>
				</div>
			</div>
			<div class=" about member-summary-section clearfix">
				<div class="about-container js-about-container">
					<p>
                        <?php echo get_sub_string($user_info->cus_description, 25); ?>
                        <a class="call-to-action about-read-more about-dialog-trigger" >xem thêm...</a>
                        
					</p>
				</div>
			</div>
			<div class=" location member-summary-section clearfix">
				<div class="location-container crop"><i class="fpph-location"></i><?php echo $user_info->cus_city; ?></div>
			</div>
			<div class=" contact member-summary-section clearfix">
				<a class="btn contact-button" rel="nofollow" href="#">Contact</a>
			</div>
		</div>
		<br class="clear"/>
		<div class="clearfix gutter-top">
			<div class="lifted-corners with-handles">
				<div class="handles"></div>
				<div class="center-block">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Money protection guarantee" class="money-protection-guarantee pull-left">
					<div class="pull-left">
						<h5>
							Money Protection<br/>Guarantee <aside>Job done or your money back</aside>
						</h5>
					</div>
				</div>
			</div>
		</div>
		
		<br class="clear"/>
		<div class="sidebar-box prepend-top clearfix js-auto-pause-hidden">
			<div class="clearfix widget-recommended-hourlies sidebar-box">
                <?php   
                    $args = array(
                        'posts_per_page' => 5
                    );
                    $the_query = new WP_Query($args);
                    if ( $the_query->have_posts() ) {
                                	
                ?>    	
            
				<h2 class="bubble">Bài viết gợi ý</h2>
				<hr/>
				<ul class="clearfix recommended-hourlie-items">
                    <?php while ( $the_query->have_posts() ) {
                  		    $the_query->the_post();
                            $full_name = get_user_meta( get_the_author_ID(), 'first_name', true ).' '.get_user_meta( get_the_author_ID(), 'last_name', true );
                        ?>
                       
                       <li class="clearfix">
						<div class="col-xs-4 no-padding-left no-padding-right image">
							<a href="<?php the_permalink() ?>" class="img-container" title="<?php the_title(); ?>" >
								<?php the_post_thumbnail('thumbnail', array( 'class' => 'hourlie-image' )); ?>
							</a>
						</div>
						<div class="col-xs-8 no-padding-right no-padding-left">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="title clearfix">
								<?php the_title(); ?>
                            </a>
							<div class="details crop pull-left">
							 <a href="#"><?php echo $full_name; ?></a>    
                            </div>
						</div>
						<div class="clearfix horizontal-line stretch"></div>
					</li>
                       
                       
                <?php } ?>
                  
				</ul>
                <?php } ?>
			</div>
		</div>
		<br class="clear"/>    
		</aside>
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
                    <?php echo $user_info->cus_description; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery1.4.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.color.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
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