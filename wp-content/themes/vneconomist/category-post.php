<?php
/**
 * The template for displaying category page.
 *
 * @file      category.php
 * @package   VnEconomist news
 * @author    Chinh Tran
 * 
 **/
?>
<?php get_header();?>
<?php  $cat_ID = get_query_var('cat');  ?>

<div class="container container-top"></div>

<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-left with-left-sidebar">
		<div class="main-content controller-hourlie action-list">
			<section class="listings-container hourlies-listing-container" id="hourlies-listing">
				<div class="bg-fill clearfix options-container">
					<header class="clear">
						<h1 id="hourlies-listing-heading"> <?php echo get_cat_name( $cat_ID ) ?>  </h1>
					</header>
				</div>
				<div class="results list" id="hourlies-listing-results">
					<div id="hourlies-listing-listview" class="list-view">
						<div class="items clearfix items-results ">
                        
                            <?php  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                                $args = array(
                                    'cat'                 =>$cat_ID,
                                	'posts_per_page'      => 20,
                                    'paged' => $paged,
                                );
                                $the_query = new WP_Query($args);
                                // The Loop
                                if ( $the_query->have_posts() ) {
                                	
                                	while ( $the_query->have_posts() ) {
                                		$the_query->the_post();
                                        $user_info = get_userdata(get_the_author_ID()); 
                                        $full_name = $user_info->first_name.' '.$user_info->last_name;
                                        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                                        $avatar_url =  site_url( $user_info->cus_avatar );
                                        ?>
                                        
                                        
                                    <div class="clearfix listing-row hourlie-list-item ">
        								<div class="col-xs-5 col-sm-4  hourlie-image-container row-image-container">
        								      
                                            <a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> " class="hourlie-image-frame ">  
                                               <img width="238" height="140" src="<?php echo c_crop_image_resize($url, 238, 140, true); ?> " class=" wp-post-image" alt="Capture"/>       
                                                <span class="circle">5,0</span>
                                            </a>
        								</div>
        								<div class="col-xs-7 col-sm-8 no-padding-left no-padding-right hourlie-info">
        									<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
        										<h3 class="title">
        											<a href="<?php esc_url(the_permalink())?>" class="js-paragraph-crop" data-height="60"> 
        												<?php the_title() ?>
        											</a>
        										</h3>
                                                <br class="clear"/>
        										<ul class="clearfix member-info horizontal left crop">
        											<li>
        												<div class="user-image pull-left">
        													<a class="member-name" title="<?php echo $full_name; ?>" rel="nofollow" href="<?php echo site_url( '/c/user/personal/'. $user_info->user_login);?>">
                                                                <img class="user-avatar user-avatar-sm user-avatar-square" src="<?php  echo c_crop_image_resize($avatar_url, 30, 30, true)?>" alt="" width="30" height="30"/>
                                                            </a>                    
                                                        </div>
        												<div class="pull-left">
        													<span class="member-first-name crop"><a class="member-name" title="<?php echo $full_name; ?>" rel="nofollow" href="<?php echo site_url( '/c/user/personal/'. $user_info->user_login);?>"><?php echo $full_name; ?></a></span>
        													<span class="user-country crop"><?php echo $user_info->cus_city; ?></span>
        												</div>
        											</li>
                                                    <li class="js-tooltip" title="Hourlie's Rating">
        												<i class="fpph-thumb-up color-gray"></i>
                                                        <span class="hourlie-info-value">99</span>
        												<span>Votes</span>
        												
        											</li>
        											<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
        												<i class="fpph-clock-wall color-gray"></i>
        												<span class="hourlie-info-value">1,200 Views</span>
        											</li>
        											<li class="js-tooltip" title="Hourlies sold">
        												<i class="fpph-buyer-activity color-gray"></i>
                                                        <span class="hourlie-info-value">79</span>
        												<span>Bình luận</span>
        												
        											</li>
        											
        										</ul>
        									</div>
        									<br class="clear"/>
        								</div>
        							</div>
                                        
	                       <?php }} wp_reset_postdata(); ?>
                        
                        
						</div>
						<div class="pager">
							<div class="pagination clearfix">
								<?php if($the_query->max_num_pages > 1){ 
                                    if( $the_query->max_num_pages > 10 ){
                                                                
                                        $limit = $paged + 10;
                                        $limit = ( $limit > $the_query->max_num_pages)? $the_query->max_num_pages: $limit;
                                        $start = ( $paged >= 3)? ($paged - 2): $paged;
                                        
                                    } else{
                                    $limit = $the_query->max_num_pages;
                                    $start = 1;
                                }
                                ?>
								<ul data-responsive="1" role="navigation" id="hourlies-listing-pager" class="yiiPager">
                                    <?php
                                        if ($paged > 1) { ?>
                                        <li class=""><a href="<?php echo esc_url(get_category_link($cat_ID)).'?page=' . ($paged - 1);?>" data-page="<?php echo ($paged - 1);?>" class="previous" title="Trang trước" ><i class="fa fa-angle-left"></i></a></li>
                                    <?php }
                                    for( $i= $start; $i <= $limit; $i++){ ?>
									
									<li class="hidden-xs"><a href="<?php echo esc_url(get_category_link($cat_ID)).'?page=' . $i; ?>" data-page="<?php echo $i;?>" class="<?php echo ($paged == $i)? "selected": ""; ?>" title="Trang <?php echo $i;?>" ><?php echo $i;?></a></li>
									<?php }
                                    if($paged < $the_query->max_num_pages){ ?>
                                        <li class=""><a href="<?php echo esc_url(get_category_link($cat_ID)).'?page=' . ($paged + 1);?>" data-page="<?php echo ($paged + 1);?>" class="next" title="Trang tiếp theo" ><i class="fa fa-angle-right"></i></a></li>
								    <?php } ?>
                                </ul>
                                <?php } ?> 
							</div>
						</div>
						
					</div>    
				</div>
				</section>
			</div>
		<aside class="left-column sidebar-hourlie-list offcanvas-sidebar">
			<section class="clearfix hourlies-listing-sidebar listings-sidebar" id="listing-sidebar">
				<div class="clearfix gutter-top gutter-bottom visible-xs visible-sm">
					<a href="#" class="js-hide-offcanvas pull-right discreet hourlie-popular-tags">
						<i class="fa fa-times fa-2x"></i>
					</a>
				</div>
				
				<br class="clear"/>
				<div class="hourlies-tags-tree listings-category-tree">
					<h3>
						<i class="fpph-categories color-pph"></i>
						Danh mục        
					</h3>
					<hr/>
					<?php
                        wp_nav_menu(array(
                    	   'menu' => 'Category Menu',
                    	   'menu_class' => 'category-tree tree-node',
                    	   'container' => false,
                        ));
                        ?> 
				</div>
				
			</section>
			<section class="prepend-top">
				<h3>
					<span class="cert cert-level10-small " data-level="TOP" ></span>
						Top Vneconomists        
				</h3>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="<?php echo get_template_directory_uri(); ?>/images/top1.jpg" alt="Diana S."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Diana S." rel="nofollow" href="#">Diana S.</a>
								
								</h2>
								<div class="member-job-title crop">Business woman</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium " data-level="5" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="<?php echo get_template_directory_uri(); ?>/images/top2.jpg" alt="Nisha M."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Nisha M." rel="nofollow" href="#">Nisha M.</a>
									
								</h2>
								<div class="member-job-title crop">PROFESSIONAL GRAPHIC DESIGNER</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level4-medium " data-level="4" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="<?php echo get_template_directory_uri(); ?>/images/top3.jpg" alt="Fatia S."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Fatia S." rel="nofollow" href="#">Fatia S.</a>
									
								</h2>
								<div class="member-job-title crop">Multimedia Specialist</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level3-medium " data-level="3" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="<?php echo get_template_directory_uri(); ?>/images/top4.jpg" alt="Alexander F."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Alexander F." rel="nofollow" href="#">Alexander F.</a>
									
								</h2>
								<div class="member-job-title crop">Web Developer, forum master, proofreader, genealogist.</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level4-medium" data-level="4" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="<?php echo get_template_directory_uri(); ?>/images/top5.jpg" alt="Caterina P. "/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Caterina P." rel="nofollow" href="#">Caterina P.</a>
									
								</h2>
								<div class="member-job-title crop">Italian Qualified Translator, Voice Over artist, E-commerce Specialist</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level1-medium" data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
				</div>
			</section>
			<section class="clearfix hourlies-listing-sidebar listings-sidebar" id="listing-sidebar">
				<div class="clearfix gutter-top gutter-bottom visible-xs visible-sm">
					<a href="#" class="js-hide-offcanvas pull-right discreet hourlie-popular-tags">
						<i class="fa fa-times fa-2x"></i>
					</a>
				</div>
				
				<br class="clear"/>
				
				<div class="hourlie-popular-tags listings-popular-tags">
					<h3>
						<i class="fpph-bookmark color-pph"></i>
						Bộ sưu tập liêu quan        
					</h3>
					<hr/>
					<div class="clearfix gutter-top">
						 <div class="col-md-12 col-lg-12 ta-center">
                            <div class="hp-collection hp-tour-in" style="padding: 0;">
                              <div class="row">
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                                <div class="col-lg-12 col-md-12 collection-item">
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
                        </div>
                      </div>
						
					</div>    
				</div>
			</section>
		</aside>
		
</div>
<?php get_footer();?>