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
<?php  $cat_ID = get_query_var('cat'); $relateCats = get_relate_catID($cat_ID) ; ?>

<div class="container container-top"></div>
<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-left with-left-sidebar">
		<aside class="left-column sidebar-hourlie-list offcanvas-sidebar">
			<section class="clearfix hourlies-listing-sidebar listings-sidebar" id="listing-sidebar">
				<div class="clearfix gutter-top gutter-bottom visible-xs visible-sm">
					<a href="#" class="js-hide-offcanvas pull-right discreet hourlie-popular-tags">
						<i class="fa fa-times fa-2x"></i>
					</a>
				</div>
				<div class="clearfix search-container" id="hourlies-listing-search">
					
				</div>
				<br class="clear">
				<div class="hourlies-tags-tree listings-category-tree">
					<h3>
						<i class="fpph-categories color-pph"></i>
						Categories        
					</h3>
					<hr>
					<ul class="category-tree sidebar-filter-options tree-node depth-0 last-level">
						<li class="depth-1  selected last-level">  
							<a href="#">All Categories<span class="level-count">24,036</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Design<span class="level-count">6,600</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Video, Photo &amp; Audio<span class="level-count">4,705</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Web Development<span class="level-count">3,935</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Sales &amp; Marketing<span class="level-count">2,967</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Business Support<span class="level-count">2,128</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Writing &amp; Translation<span class="level-count">1,897</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Social media<span class="level-count">1,176</span></a>
						</li>
						<li class="depth-1  last-level">  
							<a href="#">Software Dev &amp; Mobile<span class="level-count">628</span></a>
						</li>
					</ul>    
				</div>
				<div class="hourlie-popular-tags listings-popular-tags">
					<h3>
						<i class="fpph-bookmark color-pph"></i>
						Popular Skills        
					</h3>
					<hr>
					<div class="clearfix gutter-top">
						<ul class="hourlies-tag-list js-tag-list">
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Website development                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">6,063</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Identity design                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">3,585</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Website design                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">3,550</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										SEO                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">3,253</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Wordpress                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">3,075</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Logo                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">2,516</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Social media marketing                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">2,253</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Web writing                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,856</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Search Marketing                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,675</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Mobile website                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,635</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										HTML                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,631</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Video                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,565</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Responsive website                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,542</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Graphics design                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,531</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Image Editing                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,456</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Link building                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,350</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Illustration                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,349</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Photoshop                
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,313</div>
							</li>
							<li class="clearfix js-tag-item tag-item">
								<div class="pull-left tag-label js-tag-label">
									<a href="#">
										<i class="fa fa-circle"></i>
										Stationery  design               
									</a>
								</div>
								<div class="pull-right tag-count js-tag-count">1,306</div>
							</li>
						</ul>
						<p>
							<a href="#" class="view-more-link discreet"> view more...        </a>
						</p>
					</div>    
				</div>
			</section>
		</aside>
		<div class="main-content controller-hourlie action-list">
			<section class="listings-container hourlies-listing-container" id="hourlies-listing" data-page-title="PeoplePerHour Hourlies - Design, Creative, Writing, Development, Marketing" data-page-url="/hourlies" data-autocomplete-url="/hourlie/autoSuggest?term=%QUERY">
				<div class="bg-fill clearfix options-container">
					<header class="clear">
						<h1 id="hourlies-listing-heading">
							Hourlies
							<span data-content-selector="#help-content-55efa15a05eaf" title="Hourlies" data-trigger="hover" data-class="info" data-placement="right" class="popover-toggle tooltip-visible-lg">
								<i class="color-info fa fa-question-circle"></i>
							</span>
							<span data-content-selector="#help-content-55efa15a05eaf" title="Hourlies" data-trigger="click" class="bootbox-toggle clickable tooltip-hidden-lg">
								<i class="color-info fa fa-question-circle"></i>
							</span>
							<div style="display: none !important;" id="help-content-55efa15a05eaf">Ready-to-go fixed price offers that can start today!</div>                
							<aside id="hourlies-listing-count">
								<div class="clearfix">
									<span class="hidden-xs">34,731 found</span>
								</div>
							</aside>
							<div class="hidden-md hidden-lg pull-right drop-filters-trigger">
								<a href="#" class="js-show-offcanvas">
									<i class="fa fa-search"></i>
								</a>
							</div>
						</h1>
					</header>
					<div data-hook="filters" id="hourlies-listing-filters" class="filters-container">
						<form id="hourlies-listing-search-form" action="/hourlies" method="POST">
							<div style="display:none"><input type="hidden" value="31d41365ab376728e548533230ffea87d65cd731" name="YII_CSRF_TOKEN" /></div>   
							<div class="toolbox clearfix basic-filters hidden-xs" data-hook="filters">
							<div class="row">
								<div class="col-xs-8">
									<label class="form-label pull-left sort-label">Sort by </label>
									<div class="col-xs-9 col-sm-4 sorting-options">
										<select name="sort" id="sort">
											<option value="featured">Featured</option>
											<option value="pph-picks">PPH Mix</option>
											<option value="trending" selected="selected">Trending</option>
											<option value="most-popular">Popularity</option>
											<option value="latest">Recently Sold</option>
											<option value="seller-rating">Seller Rating</option>
											<option value="price-high">Price (high to low)</option>
											<option value="price-low">Price (low to high)</option>
										</select>                
									</div>
								</div>
								<div class="col-xs-4 show-filters-container row">
									<div>
										<a href="#" class="js-tooltip color-pph js-toggle-additional-filters" title="Show additional filters" data-placement="top" data-container="body">
											<span class="fa fa-filter"></span>
											<span class="fa fa-caret-down"></span>
										</a>
									</div>
									<div class="control-group with-vertical-separator switch-view-container" id="hourlies-listing-switch">
										<a class="switch-mode-btn js-tooltip js-switch-mode" rel="nofollow" title="Switch to grid mode" data-mode="grid" href="#">
											<i class="fpph-grid-view"></i>
										</a>
										<a class="switch-mode-btn js-tooltip active js-switch-mode" rel="nofollow" title="Switch to list mode" data-mode="list" href="#">
											<i class="fpph-list-view"></i>
										</a>                
									</div>
								</div>
							</div>
						</div>
						<div class="clear col-xs-12 toolbox gutter-top additional-filters js-additional-filters" style="display: none;">
							<div class="row additional-filters-wrapper">
								<h3>	Additional filters            </h3>
								<hr>
								<div class="clearfix additional-filters-container">
									<div class="col-xs-6 col-sm-3 sorting-option">
										<label class="form-label">Seller Country</label>
										<select name="country" id="country">
											<option value="" selected="selected">All Countries</option>
											<option value="GB">United Kingdom  (11,968)</option>
											<option value="IN">India  (6,379)</option>
											<option value="BD">Bangladesh  (3,601)</option>
											<option value="PK">Pakistan  (2,645)</option>
											<option value="US">United States  (1,746)</option>
											<option value="PH">Philippines  (436)</option>
											<option value="RO">Romania  (417)</option>
											<option value="LK">Sri Lanka  (385)</option>
											<option value="GR">Greece  (331)</option>
											<option value="IT">Italy  (305)</option>
											<option value="ES">Spain  (295)</option>
											<option value="ID">Indonesia  (287)</option>
											<option value="DE">Germany  (271)</option>
											<option value="PT">Portugal  (228)</option>
											<option value="IE">Ireland  (227)</option>
											<option value="KE">Kenya  (226)</option>
											<option value="EG">Egypt  (206)</option>
											<option value="RS">Serbia  (200)</option>
											<option value="NP">Nepal  (197)</option>
											<option value="BG">Bulgaria  (195)</option>
											<option value="NG">Nigeria  (182)</option>
											<option value="CA">Canada  (173)</option>
											<option value="AE">United Arab Emirates  (169)</option>
											<option value="UA">Ukraine  (156)</option>
											<option value="ZA">South Africa  (142)</option>
											<option value="VN">Viet Nam  (139)</option>
											<option value="MK">Macedonia, the Former Yugoslav Republic of  (133)</option>
											<option value="AU">Australia  (128)</option>
											<option value="FR">France  (124)</option>
											<option value="PL">Poland  (124)</option>
											<option value="MY">Malaysia  (113)</option>
											<option value="MA">Morocco  (113)</option>
											<option value="SE">Sweden  (107)</option>
											<option value="JM">Jamaica  (93)</option>
											<option value="VE">Venezuela  (90)</option>
											<option value="NL">Netherlands  (89)</option>
											<option value="TN">Tunisia  (84)</option>
											<option value="TH">Thailand  (82)</option>
											<option value="HR">Croatia  (81)</option>
											<option value="LV">Latvia  (81)</option>
											<option value="RU">Russian Federation  (79)</option>
											<option value="TR">Turkey  (71)</option>
											<option value="BR">Brazil  (65)</option>
											<option value="AR">Argentina  (65)</option>
											<option value="MX">Mexico  (64)</option>
											<option value="SG">Singapore  (62)</option>
											<option value="CN">China  (56)</option>
											<option value="CH">Switzerland  (55)</option>
											<option value="SI">Slovenia  (54)</option>
											<option value="BA">Bosnia and Herzegovina  (52)</option>
											<option value="AL">Albania  (52)</option>
											<option value="DZ">Algeria  (50)</option>
											<option value="UY">Uruguay  (49)</option>
											<option value="HK">Hong Kong  (47)</option>
											<option value="DK">Denmark  (47)</option>
											<option value="CZ">Czech Republic  (45)</option>
											<option value="SA">Saudi Arabia  (40)</option>
											<option value="CY">Cyprus  (39)</option>
											<option value="MT">Malta  (38)</option>
											<option value="JP">Japan  (37)</option>
											<option value="HU">Hungary  (37)</option>
											<option value="NZ">New Zealand  (36)</option>
											<option value="MD">Moldova, Republic of  (36)</option>
											<option value="IL">Israel  (33)</option>
											<option value="TT">Trinidad and Tobago  (32)</option>
											<option value="LT">Lithuania  (31)</option>
											<option value="BE">Belgium  (31)</option>
											<option value="GH">Ghana  (28)</option>
											<option value="CO">Colombia  (26)</option>
											<option value="AM">Armenia  (26)</option>
											<option value="IR">Iran, Islamic Republic of  (25)</option>
											<option value="ZW">Zimbabwe  (22)</option>
											<option value="NO">Norway  (22)</option>
											<option value="PS">Palestinian Territory, Occupied  (21)</option>
											<option value="LB">Lebanon  (20)</option>
											<option value="GE">Georgia  (19)</option>
											<option value="KW">Kuwait  (17)</option>
											<option value="AT">Austria  (17)</option>
											<option value="FI">Finland  (16)</option>
											<option value="EE">Estonia  (14)</option>
											<option value="PA">Panama  (14)</option>
											<option value="PE">Peru  (13)</option>
											<option value="MU">Mauritius  (11)</option>
											<option value="BY">Belarus  (10)</option>
											<option value="ME">Montenegro  (10)</option>
											<option value="SY">Syrian Arab Republic  (9)</option>
											<option value="GI">Gibraltar  (9)</option>
											<option value="SK">Slovakia  (7)</option>
											<option value="CL">Chile  (7)</option>
											<option value="BH">Bahrain  (7)</option>
											<option value="BZ">Belize  (7)</option>
											<option value="UZ">Uzbekistan  (6)</option>
											<option value="JO">Jordan  (6)</option>
											<option value="KZ">Kazakhstan  (6)</option>
											<option value="ET">Ethiopia  (6)</option>
											<option value="GT">Guatemala  (6)</option>
											<option value="BM">Bermuda  (5)</option>
											<option value="KR">Korea, Republic of  (4)</option>
											<option value="CW">Curaçao  (4)</option>
											<option value="CM">Cameroon  (4)</option>
										</select>                
									</div>
                                <div class="col-xs-6 col-sm-3 filtering-option">
                                        <input type="checkbox" class="white-checkbox pph-custom-input" id="filter-with-sales" name="filter" value="with-sales" >
									<label for="filter-with-sales">Hourlies with Sales </label>
								</div>
								<div class="col-xs-6 col-sm-3 filtering-option">
														<input type="checkbox" class="white-checkbox pph-custom-input" id="filter-local" data-invalidate="#country" data-value="VN" name="local" value="1" >
									<label for="filter-local"> Local Sellers                    </label>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="q" value="" id="hidden-q">
					</form>
				</div>
			</div>
			<div class="results list" id="hourlies-listing-results">
				<div id="hourlies-listing-listview" class="list-view">
					<div class="items clearfix items-results ">
						<div class="clearfix listing-row hourlie-list-item featured-row">
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
											Design high quality logo+ Unlimited revisions + Editable source files                
										</a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Amanda P." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/13b9c4759030b85793e924b1d482a625_70x70.jpg" alt="Amanda" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Amanda P." rel="nofollow" href="#">Amanda</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 4 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">4 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">97</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">98%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">   </div>
										<div class="goto-product actions">
											<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Send you 2000 traffic daily for upto 5 days to boost your Alexa and Google rank                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Yoeffects O." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/5189503eca052a95a44fe4cdeea5561d_70x70.jpg" alt="Yoeffects" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Yoeffects O." rel="nofollow" href="#">Yoeffects</a></span>
												<span class="user-country crop">India</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 5 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">5 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">18</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
											Design professional logo with unlimited revisions in 24 hours                
										</a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="UKWebStudio Ltd -." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/8b4d9717505e197e51cdc84da568b62c_70x70.png" alt="UKWebStudio Ltd" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="UKWebStudio Ltd -." rel="nofollow" href="#">UKWebStudio Ltd</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">88</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">94%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Give 3000 Twitter USA Follower[HQ] or1000 FB Fan Page Like or 3000 Instagram Follower                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Abhishav G." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/9eacf244449bc43371f244153fb54ce5_70x70.jpg" alt="Abhishav" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Abhishav G." rel="nofollow" href="https://www.peopleperhour.com/freelancer/abhishav/software-developer-and-functional-c/1001167">Abhishav</a></span>
												<span class="user-country crop">India</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 5 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">5 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">71</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
										<div class="goto-product actions">
											<a href="#" class="btn">Learn more</a>
										</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design a high-quality logo design unlimited revisions </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Denis S." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/43c6a27324bcbbc3022739d390ff84dc_70x70.jpg" alt="Denis" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Denis S." rel="nofollow" href="https://www.peopleperhour.com/freelancer/denis/graphic-designer-web-developer/1027583">Denis</a></span>
												<span class="user-country crop">Bulgaria</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">15</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">97%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">   </div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="" class="js-paragraph-crop" data-height="60">
											Review for your web page and produce SEO audit report to rank No1 in Google                
										</a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Tina L." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/a45132d2ee2b32551b9d2ff4d35471ff_70x70.png" alt="Tina" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop">
													<a class="member-name" title="Tina L." rel="nofollow" href="#">Tina</a>
												</span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">11</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									<div class="goto-product actions">
										<a href="" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
											Design a professional high quality logo for your business                
										</a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Mark W." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/778147f3897ca6e3cb669002832b7651_70x70.jpg" alt="Mark" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Mark W." rel="nofollow" href="#">Mark</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">17</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Make a testimonial video to promote your website , business or Product </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Yoeffects O." rel="nofollow" href="#">
													<img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/5189503eca052a95a44fe4cdeea5561d_70x70.jpg" alt="Yoeffects" />
												</a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Yoeffects O." rel="nofollow" href="#">Yoeffects</a></span>
												<span class="user-country crop">India</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 5 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">5 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">6</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									 <div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Provide 30 minutes of maintenance / update / fixes to WordPress website  </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="V T." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/da94d92833676061adf39da5f1a27d07_70x70.jpg" alt="V" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="V T." rel="nofollow" href="#">V</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">6</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design a professional vector logo with unlimited revisions, and free favicon                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Leslie T." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/86d8e91dabc563d55a8da75e7f20e7af_70x70.png" alt="Leslie" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Leslie T." rel="nofollow" href="#">Leslie</a></span>
												<span class="user-country crop">United States</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">6</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"> </div>
									 <div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Draw a custom whiteboard  illustration or scene  </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Narcissus H." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/65c42b5ad8c568ccf6c60a5214ed8f36_70x70.jpg" alt="Narcissus" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Narcissus H." rel="nofollow" href="#">Narcissus</a></span>
												<span class="user-country crop">Viet Nam</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 3 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">3 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">5</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Create high PR SEO link building for increase google ranking panda penguin seafe                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Nilupul P." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/edc8077b6e23972dd9de7a84a0fa84f3_70x70.jpg" alt="Nilupul" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Nilupul P." rel="nofollow" href="#">Nilupul</a></span>
												<span class="user-country crop">Sri Lanka</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 3 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">3 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">4</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Provide genuine 1600 Facebook Likes or 3000+ Instagram / USA Twitter Followers                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Shahrukh Z." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/4da1f83014023ee4f8908e7923e8c67a_70x70.jpeg" alt="Shahrukh" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Shahrukh Z." rel="nofollow" href="#">Shahrukh</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">25</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design high quality professional 3d vector logo with unlimited concept and revisions                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Musa A." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/442410c1b010d0860f399a88676931db_70x70.png" alt="Musa" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Musa A." rel="nofollow" href="#">Musa</a></span>
												<span class="user-country crop">Bangladesh</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">10</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Re-touch your Picture (PRO Image Edit)                </a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Marko J." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/147502_70x70.jpg" alt="Marko" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Marko J." rel="nofollow" href="#">Marko</a></span>
												<span class="user-country crop">Serbia</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">13</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									 </ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									 <div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design 7 eye catching Logo concepts with unlimited revisions in 24 hours </a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Uroosa Ali M." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/60e2f194678c8bd64bfdfd95bfb77f08_70x70.jpg" alt="Uroosa Ali" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Uroosa Ali M." rel="nofollow" href="#">Uroosa Ali</a></span>
												<span class="user-country crop">Australia</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">85</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">97%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design a professional logo with unlimited revisions and free favicon                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Matt S." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/5796f43d61d3fef0c0f0b18e9f384737_70x70.png" alt="Matt" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Matt S." rel="nofollow" href="#">Matt</a></span>
												<span class="user-country crop">United States</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">21</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design creative Logo with unlimited revisions in 24 hours                </a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            </h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Muhammad F." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/ee6373d3fa6f6ae9707865f09de60e5c_70x70.PNG" alt="Muhammad" /></a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Muhammad F." rel="nofollow" href="#">Muhammad</a></span>
												<span class="user-country crop">Pakistan</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">10</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Create this super 3D logo reveal HD Intro video                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Gayan I." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/83ac33aecaf160c0179f8c0eba544d43_70x70.jpg" alt="Gayan" /></a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Gayan I." rel="nofollow" href="#">Gayan</a></span>
												<span class="user-country crop">Sri Lanka</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 2 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">2 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">19</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Design 3 logo concepts for your company or website                </a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
																<div class="user-image pull-left">
												<a class="member-name" title="Robin W." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/c04503107abfc614e9b72a16c1a3eab0_70x70.png" alt="Robin" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Robin W." rel="nofollow" href="#">Robin</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
														<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
														<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">29</span>
										</li>
														<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Provide genuine 10 high authority PR9 Panda,Penguin SAFE Back Links for SEO                </a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Ashish G." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/e8494f3bf2dc66376a5203eddccdcf98_70x70.jpg" alt="Ashish" /></a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Ashish G." rel="nofollow" href="#">Ashish</a></span>
												<span class="user-country crop">India</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 4 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">4 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">5</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">84%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Write/re-write any piece that is 1,000 words (or under)                
										</a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Sadia P." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/431f9ac9bf726e9b7f158ed8b8266be0_70x70.jpg" alt="Sadia" /></a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Sadia P." rel="nofollow" href="#">Sadia</a></span>
												<span class="user-country crop">United Kingdom</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">6</span>
										</li>
										<li class="js-tooltip" title="Seller's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item featured-row no-bg">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60">
										Add 1000 facebook likes or 3000 twitter followers to promote your business                
										</a>
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Md Zahidul Islam P." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/658775d7458ef91c4535bbc40103462f_70x70.jpg" alt="Md Zahidul Islam" /></a>                    </div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Md Zahidul Islam P." rel="nofollow" href="#">Md Zahidul Islam</a></span>
												<span class="user-country crop">Bangladesh</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 3 days">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">3 days</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">5</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag"></div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
						<div class="clearfix listing-row hourlie-list-item ">
							
							<div class="col-xs-12 col-sm-12 no-padding-left no-padding-right hourlie-info">
								<div class="col-xs-8 col-sm-9 info no-padding-left no-padding-right">
									<h3 class="title">
										<a href="#" class="js-paragraph-crop" data-height="60"> 
										Design your professional Brand Identity with unlimited revision in 24 hours                
										</a>
										<span class="express-icon js-tooltip" title="Top quality delivered in just 1 day"></span>            
									</h3>
									<ul class="clearfix member-info horizontal left crop">
										<li>
											<div class="user-image pull-left">
												<a class="member-name" title="Muhammad H." rel="nofollow" href="#"><img class="user-avatar user-avatar-xs user-avatar-square" onerror="this.src=&#039;https://d3ambpg2zf25sl.cloudfront.net/imgs/blank_profile_pic_60x60.jpg&#039;" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/5e7d869e922c5e59e06b860bdd85ece5_70x70.jpg" alt="Muhammad" /></a>                    
											</div>
											<div class="pull-left">
												<span class="member-first-name crop"><a class="member-name" title="Muhammad H." rel="nofollow" href="#">Muhammad</a></span>
												<span class="user-country crop">Pakistan</span>
											</div>
										</li>
										<li class="js-tooltip hidden-xs" title="Delivered in 1 day">
											<i class="fpph-clock-wall color-gray"></i>
											<span>Delivery in</span>
											<span class="hourlie-info-value">1 day</span>
										</li>
										<li class="js-tooltip" title="Hourlies sold">
											<i class="fpph-buyer-activity color-gray"></i>
											<span>Sales</span>
											<span class="hourlie-info-value">9</span>
										</li>
										<li class="js-tooltip" title="Hourlie's Rating">
											<i class="fpph-thumb-up color-gray"></i>
											<span>Rating</span>
											<span class="hourlie-info-value">100%</span>
										</li>
									</ul>
								</div>
								<div class="col-xs-4 col-sm-3 details">
									<div class="price-tag">  </div>
									<div class="goto-product actions">
										<a href="#" class="btn">Learn more</a>
									</div>
								</div>
								<br class="clear">
							</div>
						</div>
					</div>
					<div class="pager">
						<div class="pagination clearfix">
							<ul data-responsive="1" role="navigation" id="hourlies-listing-pager" class="yiiPager">
								<li class="hidden-xs"> <span class="inactive"><i class="fa fa-angle-left"></i></span></li>
								<li class=""><a data-page="1" class=" selected" title="go to page 1" href="#">1</a></li>
								<li class="hidden-xs"><a data-page="2" class="" title="go to page 2" href="#">2</a></li>
								<li class="hidden-xs"><a data-page="3" class="" title="go to page 3" href="#">3</a></li>
								<li class="hidden-xs"><a data-page="4" class="" title="go to page 4" href="#">4</a></li>
								<li class="hidden-xs"><a data-page="5" class="" title="go to page 5" href="#">5</a></li>
								<li class="hidden-xs"><a data-page="6" class="" title="go to page 6" href="#">6</a></li>
								<li class="hidden-xs"><a data-page="7" class="" title="go to page 7" href="#">7</a></li>
								<li class="hidden-xs"><a data-page="8" class="" title="go to page 8" href="#">8</a></li>
								...<li class="hidden-xs"><a data-page="1448" class="" title="go to page 1448" href="#">1448</a></li>
								<li class=""><a data-page="2" class="next" title="" href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
					</div>
					
				</div>    
			</div>
		</section>
	</div>
</div>

<?php get_footer();?>