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
                        
                            <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
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
                                        ?>
                                        
                                        
                                    <div class="clearfix listing-row hourlie-list-item ">
        								<div class="col-xs-3 col-sm-3 hourlie-image-container row-image-container">
        								      
                                            <a href="<?php esc_url(the_permalink())?>" title="<?php the_title() ?> " class="hourlie-image-frame ">
        									   <?php the_post_thumbnail( array(169, 105) );?>       
                                            </a>
        								</div>
        								<div class="col-xs-9 col-sm-9 no-padding-left no-padding-right hourlie-info">
        									<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
        										<h3 class="title">
        											<a href="<?php esc_url(the_permalink())?>" class="js-paragraph-crop" data-height="60"> 
        												<?php the_title() ?>
        											</a>
        										</h3>
        										<ul class="clearfix member-info horizontal left crop">
        											<li>
        												<div class="user-image pull-left">
        													<a class="member-name" title="Vector M." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/b3c5e29ccc8cfdfce26ee279931d3f8f_70x70.png" alt="Vector" /></a>                    </div>
        												<div class="pull-left">
        													<span class="member-first-name crop"><a class="member-name" title="Vector M." rel="nofollow" href="#">Vector</a></span>
        													<span class="user-country crop">United Kingdom</span>
        												</div>
        											</li>
        											<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
        												<i class="fpph-clock-wall color-gray"></i>
        												<span class="hourlie-info-value">1,200 view</span>
        											</li>
        											<li class="js-tooltip" title="Hourlies sold">
        												<i class="fpph-buyer-activity color-gray"></i>
                                                        <span class="hourlie-info-value">790</span>
        												<span>votes</span>
        												
        											</li>
        											<li class="js-tooltip" title="Hourlie's Rating">
        												<i class="fpph-thumb-up color-gray"></i>
                                                        <span class="hourlie-info-value">99</span>
        												<span>Bình luận</span>
        												
        											</li>
        										</ul>
        									</div>
        									<div class="col-xs-4 col-sm-3 details">
        										 
        									</div>
        									<br class="clear"/>
        								</div>
        							</div>
                                        
	                       <?php }} wp_reset_postdata(); ?>
                        
                        
						</div>
						<div class="pager">
							<div class="pagination clearfix">
								<ul data-responsive="1" role="navigation" id="hourlies-listing-pager" class="yiiPager">
									<li class="hidden-xs"><span class="inactive"><i class="fa fa-angle-left"></i></span></li>
									<li class=""><a data-page="1" class=" selected" title="go to page 1" href="#">1</a></li>
									<li class="hidden-xs"><a data-page="2" class="" title="go to page 2" href="#">2</a></li>
									<li class="hidden-xs"><a data-page="3" class="" title="go to page 3" href="#">3</a></li>
									<li class="hidden-xs"><a data-page="4" class="" title="go to page 4" href="#">4</a></li>
									<li class="hidden-xs"><a data-page="5" class="" title="go to page 5" href="#">5</a></li>
									<li class="hidden-xs"><a data-page="6" class="" title="go to page 6" href="#">6</a></li>
									<li class="hidden-xs"><a data-page="7" class="" title="go to page 7" href="#">7</a></li>
									<li class="hidden-xs"><a data-page="8" class="" title="go to page 8" href="#">8</a></li>...
									<li class="hidden-xs"><a data-page="1450" class="" title="go to page 1450" href="#">1450</a></li>
									<li class=""><a data-page="2" class="next" title="" href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
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
						Categories        
					</h3>
					<hr/>
					<ul class="category-tree sidebar-filter-options tree-node depth-0 last-level">
						<li class="depth-1  selected last-level">  
							<a href="#">All Categories </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Design </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Video, Photo &amp; Audio </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Web Development </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Sales &amp; Marketing </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Business Support </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Writing &amp; Translation </a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Social media</a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Software Dev &amp; Mobile</a>
						</li>
					</ul>    
				</div>
				
			</section>
			<section class="prepend-top">
				<h3>
					<i class="fpph-categories color-pph"></i>
						Top Vneconomists        
				</h3>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_150x150.jpg" alt="Kriss Anne D."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Kriss Anne D." rel="nofollow" href="#">Kriss Anne D.</a>
								
								</h2>
								<div class="member-job-title crop">Virtual Assistant, Data Entry, Translator, Copy Editing, Online Researcher, Typist,</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium " data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_150x150.jpg" alt="Kriss Anne D."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Kriss Anne D." rel="nofollow" href="#">Kriss Anne D.</a>
									
								</h2>
								<div class="member-job-title crop">Virtual Assistant, Data Entry, Translator, Copy Editing, Online Researcher, Typist,</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium " data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_150x150.jpg" alt="Kriss Anne D."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Kriss Anne D." rel="nofollow" href="#">Kriss Anne D.</a>
									
								</h2>
								<div class="member-job-title crop">Virtual Assistant, Data Entry, Translator, Copy Editing, Online Researcher, Typist,</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium " data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_150x150.jpg" alt="Kriss Anne D."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Kriss Anne D." rel="nofollow" href="#">Kriss Anne D.</a>
									
								</h2>
								<div class="member-job-title crop">Virtual Assistant, Data Entry, Translator, Copy Editing, Online Researcher, Typist,</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium" data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
						</div>
					</div>
					
					
				</div>
				<div class="addTip-left member-summary widget-memberSummary" ref="buyer">
					<div class=" summary member-summary-section clearfix">
						<div class="member-image-container">
							<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_150x150.jpg" alt="Kriss Anne D."/>
						</div>
						<div class="member-information-container">
							<div class="member-name-container crop">
								<h2>
									<a class="crop member-short-name" title="Kriss Anne D." rel="nofollow" href="#">Kriss Anne D.</a>
									
								</h2>
								<div class="member-job-title crop">Virtual Assistant, Data Entry, Translator, Copy Editing, Online Researcher, Typist,</div>
							</div>
						</div>
						<div class="cert-container text-right">
							<span class="cert cert-level5-medium" data-level="2" data-tooltip-content="CERT i badge." data-tooltip-pos="left" title="CERT is PPH ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge."></span>
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
						Popular Skills        
					</h3>
					<hr/>
					<div class="clearfix gutter-top">
						<ul class="hourlies-tag-list js-tag-list">
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Website development                
									</a>
								</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Website design                
									</a>
								</div> 
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Identity design                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										SEO                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Wordpress                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Logo                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Social media marketing                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Web writing                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										HTML                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Search Marketing                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Mobile website                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Responsive website                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Video                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Graphics design                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Image Editing                
									</a>
								</div>
							   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Illustration                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Link building                
									</a>
								</div>
								   
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Photoshop                
									</a>
								</div>
								
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Stationery  design                
									</a>
								</div>
								
							</li>
						</ul>
						<p>
							<a href="#" class="view-more-link discreet">
								view more...        </a>
						</p>
					</div>    
				</div>
			</section>
		</aside>
		
</div>
<?php get_footer();?>