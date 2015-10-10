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
<?php $category = get_the_category(); $cat_ID = ($category[0]->category_parent > 0)? $category[0]->category_parent : $category[0]->term_id; ?>
<div class="container container-top"></div>
	<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-right">
		<div class="main-content controller-hourlie action-view">
       <?php if (have_posts()) { ?>		
             <?php while (have_posts()) : the_post();?>
			<header class="clearfix featured featured-right">
				<h1 class="clearfix"> <?php the_title()?> </h1>
			</header>
			
			
			<div class="col-xs-12 clearfix js-auto-pause-hidden hourlie-description-text">
				<?php the_content(); ?>	
			</div>
                <?php setPostViews(get_the_ID());  endwhile; ?> 
            <?php } else { ?>
        		  <div class="col-xs-12 clearfix js-auto-pause-hidden hourlie-description-text">
        				<h1 class="single-title" >Không có thông tin để hiển thị</h1>					
			     </div>
                        			
 		     <?php } ?> 
			<div class="js-auto-pause-hidden" >
				<div class="widget-order-hourlie-addons clearfix">
					<div class="title-container">
						<h2 class="col-xs-12 clearfix prepend-top">Get more with Hourlie Add-ons</h2>
					</div>
				
						<div  class="content-text clear addons-container" data-hook="addons-container">
							<ul class="addons clearfix boxmodelfix">
								
							</ul>
							<br class="clear"/>
						</div>
					</div>
			</div>
			<div class="col-xs-12 js-auto-pause-hidden hourlie-description-text">
				<h2 class="prepend-top toaster-trigger"> What the Seller needs to start the work    </h2>
				<div class="content-text clearfix"> Just provide us full description of the company followed by some sample designs    </div>
				<div class="feedbacks-container clear prepend-top">
					<div class="feedback-toggle-container visible-xs visible-sm clearfix">
						<button class="btn tall call-to-action col-xs-12" id="toggle-reviews" data-hide-msg="Hide Reviews" data-show-msg="Show Reviews (25)">
							Show Reviews (25)   </button>
					</div>
					<div class="feedbacks-list-container hidden-xs hidden-sm">
						<h2 class="prepend-top reviews clearfix">
							Reviews (25) </h2>
						<section id="feedack-230890" class="timeline clear review-list" data-hook="feedack-container">
							<div id="reviews-list" class="list-view">
								<ul class="items row">
									<li class="item participant feedback clearfix ">
										<div class="no-padding-left col-xs-4 col-sm-2 left-col">
											<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/394b6e6c67f2b49c870e4176a091ca5e_70x70.png" alt="Paul G." />        <div class="clear"></div>
										</div>
										<div class="col-xs-8 col-sm-10 right-col no-padding-right">
											<time class="message-time" title="Tue, 08 Sep 2015  at 5:28pm">Yesterday</time>
											<header class="clearfix">
												<div class="participant-name crop">
													Paul G.            </div>
												<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Edinburgh, United Kingdom </div>
												<div class="feedback-rating pull-right">
													<div class="widget-jsModuleRating clearfix">
														<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
															<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														</ul>
														<input data-hook="rating" type="hidden"  name="rating" value="5" />
													</div>            
												</div>
											</header>
											<p>Would definately use again :)</p>
										</div>
										<div class="clear"></div>
									</li>
									<li class="item participant feedback clearfix ">
										<div class="no-padding-left col-xs-4 col-sm-2 left-col">
											<img class="user-avatar user-avatar-sm" src="https://d3ambpg2zf25sl.cloudfront.net/imgs/default_avatar_light_70x70.png" alt="Thomas F." />        <div class="clear"></div>
										</div>
										<div class="col-xs-8 col-sm-10 right-col no-padding-right">
											<time class="message-time" title="Tue, 08 Sep 2015  at 4:23pm">Yesterday</time>
											<header class="clearfix">
												<div class="participant-name crop"> Thomas F. </div>
												<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Wakefield, United Kingdom  </div>
												<div class="feedback-rating pull-right">
													<div class="widget-jsModuleRating clearfix">
														<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
															<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														</ul>
														<input data-hook="rating" type="hidden"  name="rating" value="5" />
													</div>           
												</div>
											</header>
											<p>Good quality for the fee</p>
										</div>
										<div class="clear"></div>
									</li>
									<li class="item participant feedback clearfix ">
										<div class="no-padding-left col-xs-4 col-sm-2 left-col">
											<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/154355_70x70.jpg" alt="Philip P." />        <div class="clear"></div>
										</div>
										<div class="col-xs-8 col-sm-10 right-col no-padding-right">
											<time class="message-time" title="Mon, 07 Sep 2015  at 5:49pm">Mon 5:49pm</time>
											<header class="clearfix">
												<div class="participant-name crop">
													Philip P.            </div>
												<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Valencia, Spain            </div>
												<div class="feedback-rating pull-right">
													<div class="widget-jsModuleRating clearfix">
														<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
															<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														</ul>
														<input data-hook="rating" type="hidden"  name="rating" value="5" />
													</div>            
												</div>
											</header>
											<p>Excellent service from Amanda, my complete fault for not getting back to her on time (called away).<br />
											<br />
											So apologies Amanda and thank you for great work. Philip</p>
											</div>
										<div class="clear"></div>
									</li>
									<li class="item participant feedback clearfix ">
										<div class="no-padding-left col-xs-4 col-sm-2 left-col">
											<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/0652262f7c3f7bda3f3eb03cdd28b860_70x70.jpg" alt="Ronald K." />        <div class="clear"></div>
										</div>
										<div class="col-xs-8 col-sm-10 right-col no-padding-right">
											<time class="message-time" title="Mon, 07 Sep 2015  at 4:23am">Mon 4:23am</time>
											<header class="clearfix">
												<div class="participant-name crop">
													Ronald K.            </div>
												<div class="participant-location hidden-xs">
													<i class="fpph fpph-location"></i>Pittsburgh, United States            </div>
												<div class="feedback-rating pull-right">
													<div class="widget-jsModuleRating clearfix">
														<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
															<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														</ul>
														<input data-hook="rating" type="hidden"  name="rating" value="5" />
													</div>            
												</div>
											</header>
											<p>Simple logo design, but very nice to work with once we got the ball rolling.</p>
										</div>
										<div class="clear"></div>
									</li>
									<li class="item participant feedback clearfix ">
										<div class="no-padding-left col-xs-4 col-sm-2 left-col">
											<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/a1fd0b535a1b3099a3757caf5c3e2ece_70x70.jpg" alt="Aykut I." />        <div class="clear"></div>
										</div>
										<div class="col-xs-8 col-sm-10 right-col no-padding-right">
											<time class="message-time" title="Sun, 06 Sep 2015  at 10:03pm">Sun 10:03pm</time>
											<header class="clearfix">
												<div class="participant-name crop">
													Aykut I.    
												</div>
												<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Istanbul, Turkey  </div>
												<div class="feedback-rating pull-right">
													<div class="widget-jsModuleRating clearfix">
														<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
															<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
															<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														</ul>
														<input data-hook="rating" type="hidden"  name="rating" value="5" />
													</div>            
												</div>
											</header>
											<p>great work, offered alternatives, thank you very much</p>
										</div>
									<div class="clear"></div>
								</li>
								<li class="item participant feedback clearfix ">
									<div class="no-padding-left col-xs-4 col-sm-2 left-col">
										<img class="user-avatar user-avatar-sm" src="https://d3ambpg2zf25sl.cloudfront.net/imgs/default_avatar_light_70x70.png" alt="Afghan K." />        <div class="clear"></div>
									</div>
									<div class="col-xs-8 col-sm-10 right-col no-padding-right">
										<time class="message-time" title="Sun, 06 Sep 2015  at 9:06pm">Sun 9:06pm</time>
										<header class="clearfix">
											<div class="participant-name crop">
												Afghan K.            </div>
											<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>London, United Kingdom </div>
											<div class="feedback-rating pull-right">
												<div class="widget-jsModuleRating clearfix">
													<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
														<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
													</ul>
													<input data-hook="rating" type="hidden"  name="rating" value="5" />
												</div>            
											</div>
										</header>
										<p>Fantastic job. Really easy to work with. Real professional.  </p>
									</div>
									<div class="clear"></div>
								</li>
								<li class="item participant feedback clearfix ">
									<div class="no-padding-left col-xs-4 col-sm-2 left-col">
										<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/41010_70x70.jpg" alt="Patrick K." />        <div class="clear"></div>
									</div>
									<div class="col-xs-8 col-sm-10 right-col no-padding-right">
										<time class="message-time" title="Sun, 06 Sep 2015  at 9:13am">Sun 9:13am</time>
										<header class="clearfix">
											<div class="participant-name crop"> Patrick K. </div>
											<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Manassas, United States </div>
											<div class="feedback-rating pull-right">
												<div class="widget-jsModuleRating clearfix">
													<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
														<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
													</ul>
													<input data-hook="rating" type="hidden"  name="rating" value="5" />
												</div>            
											</div>
										</header>
										<p>Great work, with a very quick turnaround. Well done!</p>
									</div>
									<div class="clear"></div>
								</li>
								<li class="item participant feedback clearfix with-replies">
									<div class="no-padding-left col-xs-4 col-sm-2 left-col">
										<img class="user-avatar user-avatar-sm" src="https://d3ambpg2zf25sl.cloudfront.net/imgs/default_avatar_light_70x70.png" alt="Fred W." />        <div class="clear"></div>
									</div>
									<div class="col-xs-8 col-sm-10 right-col no-padding-right">
										<time class="message-time" title="Sun, 06 Sep 2015  at 8:29am">Sun 8:29am</time>
										<header class="clearfix">
											<div class="participant-name crop">
												Fred W.            </div>
											<div class="participant-location hidden-xs">
												<i class="fpph fpph-location"></i>Los Angeles, United States            </div>
											<div class="feedback-rating pull-right">
												<div class="widget-jsModuleRating clearfix">
													<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
														<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
													</ul>
													<input data-hook="rating" type="hidden"  name="rating" value="5" />
												</div>            
											</div>
										</header>
										<p>All I can say is wow!!  Amanda caught my vision very easily and the aesthetic and feel of her work was very good. Her business etiquette and professionalism is spot on. Thank You Amanda.</p>
										<div class="feedback-reply clearfix">
											<div class="feedback-reply-cont clearfix">
												<div class="img-cont">
													<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/13b9c4759030b85793e924b1d482a625_70x70.jpg" alt="Amanda P." />        </div>
												<div class="review-reply">
													<div class="feedback-reply-name crop">Amanda P.</div>
													<p>Thank you very much for your feedback!</p>
												</div>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</li>
								<li class="item participant feedback clearfix ">
									<div class="no-padding-left col-xs-4 col-sm-2 left-col">
										<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/16d6a24d386ddc8c36532cacf9a861ba_70x70.jpg" alt="Lynsey H." />        <div class="clear"></div>
									</div>
									<div class="col-xs-8 col-sm-10 right-col no-padding-right">
										<time class="message-time" title="Sat, 05 Sep 2015  at 5:16pm">Sat 5:16pm</time>
										<header class="clearfix">
											<div class="participant-name crop"> Lynsey H. </div>
											<div class="participant-location hidden-xs"> <i class="fpph fpph-location"></i>Dublin, Ireland </div>
											<div class="feedback-rating pull-right">
												<div class="widget-jsModuleRating clearfix">
													<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
														<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
													</ul>
													<input data-hook="rating" type="hidden"  name="rating" value="5" />
												</div>            
											</div>
										</header>
										<p>Fantastic service from Amanda, loved the bold colours and sharp designs! I will definitely use her services again. Many thanks Amanda! </p>
									</div>
									<div class="clear"></div>
								</li>
								<li class="item participant feedback clearfix ">
									<div class="no-padding-left col-xs-4 col-sm-2 left-col">
										<img class="user-avatar user-avatar-sm" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/756781_70x70.png" alt="Bryan G." />        <div class="clear"></div>
									</div>
									<div class="col-xs-8 col-sm-10 right-col no-padding-right">
										<time class="message-time" title="Sat, 05 Sep 2015  at 8:27am">Sat 8:27am</time>
										<header class="clearfix">
											<div class="participant-name crop">
												Bryan G.            </div>
											<div class="participant-location hidden-xs">
												<i class="fpph fpph-location"></i>Sherman Oaks, United States            </div>
											<div class="feedback-rating pull-right">
												<div class="widget-jsModuleRating clearfix">
													<ul class="rating clearfix " data-disabled="1" data-hook="star-rating">
														<li class="left" data-index="1"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="2"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="3"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="4"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
														<li class="left" data-index="5"><a data-id="rating" href="#"><span class="fa fa-star star-rating active"></span></a></li>
													</ul>
													<input data-hook="rating" type="hidden"  name="rating" value="5" />
												</div>            
											</div>
										</header>
										<p>Great Job!  Will work with again!</p>
									</div>
									<div class="clear"></div>
								</li>
							</ul>
							<div class="pager">
								<div class="pagination clearfix">
									<ul id="yw3" class="yiiPager">
										<li class="hidden-xs"><span class="inactive"><i class="fa fa-angle-left"></i></span></li>
										<li class=""><a data-page="1" class=" selected" title="go to page 1" href="#">1</a></li>
										<li class="hidden-xs"><a data-page="2" class="" title="go to page 2" href="#">2</a></li>
										<li class="hidden-xs"><a data-page="3" class="" title="go to page 3" href="#">3</a></li>
										<li class=""><a data-page="2" class="next" title="" href="#"><i class="fa fa-angle-right"></i></a></li>
									</ul>
								</div>
							</div>
						</div>            
					</section>
				</div>
			</div>
		</div>
    </div>
    <aside class="right-column sidebar-hourlie-view offcanvas-sidebar">
        <div class="js-keep-in-view-marker"></div>
		<div class="clearfix js-keep-in-view hidden-xs hidden-sm cta-container">
			<div class="clearfix">
				<div class="price-container text-center gutter-top">
					<span class="js-hourlie-discounted-price discounted-price" data-price-symbol="$" data-price-amount="16"> 16 votes  </span>
				</div>
			</div>
			<div class="clear append-bottom hidden-sm hidden-xs"></div>
			<div class="clearfix actions-container">
				<div class="btn-container">
					<div class="clearfix">
					
						<div class="col-xs-8 no-padding-right">
							<form class="js-checkout-button" id="pay-hourlie-230890-55efce6987b81-form" action="#" method="GET">
								<div style="display:none"><input type="hidden" value="listings" name="ref" /></div>
								<input name="Checkout[params][quantity]" id="Checkout_params_quantity" type="hidden" value="1" />
								<input name="Checkout[params][ref]" id="Checkout_params_ref" type="hidden" value="listings" />
								<input name="Checkout[modelIds][0]" id="Checkout_modelIds_0" type="hidden" value="230890" />
								<input class="hourlie tall btn btn-inverted js-payment-button" type="submit" id="pay-hourlie-230890-55efce6987b81-button" name="pay-hourlie-230890-55efce6987b81-button" value="Vote" />
							</form>            
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
						<span>Delivery in</span><br>
						<span class="value js-delivery-days">4 days</span>
					</span>
				</div>
				<div class="col-xs-6 no-padding-left no-padding-right">
					<span class="icon-container">
						<i class="fpph fpph-thumb-up"></i>
					</span>
					<span>
						<span class="value">98%</span> Rating<br>
						<span>(25 reviews)</span>
					</span>
				</div>
			</div>
			<hr>
			<div class="clearfix detailed-information">
				<ul class="horizontal">
					<li>
						<span>Views</span>
						<span class="value">1,287</span>
					</li>
					<li>
						<span>Sales</span>
						<span class="value">97</span>
					</li>
					<li class="star-container pull-right">
						<div class="widget-star-item ">
							<a data-has-tooltip="1" rel="nofollow" data-label-add-to-fav="Add to Favourites Hourlies" data-label-remove-from-fav="Remove from Favourites Hourlies" class="action-entity-star fa fa-star js-tooltip  js-tooltip" data-title="Add to Favourites Hourlies" data-url="/hourlie/star?id=230890" id="Star-00cc2be1c2c4c4970bbe100a6c911b5f" data-isGuest="1" data-type="Hourlie" href="#">
								<span></span>
							</a>
							<span class=" count-stars">35</span>
						</div>        
					</li>
				</ul>
			</div>
		</div>
		<div class="clearfix member-summary widget-memberSummary">
			<div class=" summary member-summary-section clearfix">
				<div class="member-image-container">
					<img class="img-border-round member-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/13b9c4759030b85793e924b1d482a625_150x150.jpg" alt="Amanda P." />
				</div>
				<div class="member-information-container">
					<div class="member-name-container crop">
						<h2>
							<a class="crop member-short-name" title="Amanda P." rel="nofollow" href="#">Amanda P.</a>
							<span class="icon member-online offline" data-tooltip-content="Last seen: Today"></span>
						</h2>
						<div class="member-job-title crop">Graphic Designer , Logo designer , Web Developer , Seo promotion , Translation and all the services you can think of</div>
					</div>
				</div>
				<div class="cert-container text-right">
					<span class="cert cert-level4-medium " data-level="4" data-tooltip-content="CERT is PPH&#039;s  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" title="CERT is PPH&#039;s  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge.">
					</span>
				</div>
			</div>
			<div class=" about member-summary-section clearfix">
				<div class="about-container js-about-container">
					<p>Welcome You all , My name is Amanda Powell an established outsourcing agency owner in UK.

						We carry out a broad range of creative tasks for a diverse range of clients, from small<a class="call-to-action about-read-more js-open-about-dialog-trigger" href="#">more...</a><span style="display: none;" class="js-about-full-text">Welcome You all , My name is Amanda Powell an established outsourcing agency owner in UK.<br />
						<br />
						We carry out a broad range of creative tasks for a diverse range of clients, from small to medium sized businesses to corporate clients and charitable organisations.<br />
						<br />
						We recognise that every clientâ€™s needs are as different as they are exacting and believe a viable solution is usually a creative one.<br />
						We like to come up with bright ideas that illuminate new ways of doing business and empathise with your objectives. This approach is maintained throughout the lifetime of our relationship, as trusting us with your brand is a big step and we appreciate that, which is probably why we have so many long-term and loyal clients.<br />
						<br />
						We specialise inâ€¦<br />
						Design for traditional and digital print including end to end print management<br />
						Exhibition, merchandising and POS graphic design and large format graphics<br />
						Brand creation and management<br />
						Website design, development and optimisation<br />
						Employees: 11-15<br />
						<br />
						Describe what you can do as a professional.<br />
						Emphasize on making the first 3 lines really interesting, as only those will be initially visible to viewers.<br />
						Then you can add all the rest! (eg. previous work experience, education, areas of expertise etc.)</span>
					</p>
				</div>
			</div>
			<div class=" location member-summary-section clearfix">
				<div class="location-container crop"><i class="fpph-location"></i>United Kingdom</div>
			</div>
			<div class=" contact member-summary-section clearfix">
				<a class="btn contact-button" rel="nofollow" href="#">Contact</a>
			</div>
		</div>
		<br class="clear">
		<div class="clearfix gutter-top">
			<div class="lifted-corners with-handles">
				<div class="handles"></div>
				<div class="center-block">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Money protection guarantee" class="money-protection-guarantee pull-left">
					<div class="pull-left">
						<h5>
							Money Protection<br>Guarantee <aside>Job done or your money back</aside>
						</h5>
					</div>
				</div>
			</div>
		</div>
		<br class="clear">
		
		<br class="clear"/>
		<div class="sidebar-box prepend-top clearfix js-auto-pause-hidden">
			<div class="clearfix widget-recommended-hourlies sidebar-box">
				<h2 class="bubble">Consider also</h2>
				<hr/>
				<ul class="clearfix recommended-hourlie-items">
                    <li class="clearfix">
						<div class="col-xs-4 no-padding-left no-padding-right image">
							<a title="Design Your Logo + Business Card + Letterhead + Envelope + Compliment Slip + Fevicon" class="img-container" href="#">
								<img width="100%" height="100%" class="hourlie-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/hourliesAttachments/thumbs/110x83/2014/12/11ae382a7a2106a5d7e7b30a4bff0238.jpg" alt="Design Your Logo " />
							</a>
						</div>
						<div class="col-xs-8 no-padding-right no-padding-left">
							<a href="#" title="Design Your Logo + Business Card + Letterhead + Envelope + Compliment Slip + Fevicon" class="title clearfix">
								Design Your Logo + Business Card + Let...    </a>
								<div class="details crop pull-left">
									<a data-hook="member-popover" data-seller-id="651743" data-placement="left" data-seller-name="Dreams S." rel="member-popover" href="#">Dreams S.</a>    </div>
								<div class="price pull-right">
									<strong> $<span title="">49</span>        </strong>
								</div>
						</div>
						<div class="clearfix horizontal-line stretch"></div>
					</li>
                    <li class="clearfix">
						<div class="col-xs-4 no-padding-left no-padding-right image">
							<a title="Design your logo + business card + letterhead + envelope + compliment slip + fevicon" class="img-container" href="#">
								<img width="100%" height="100%" class="hourlie-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/hourliesAttachments/thumbs/110x83/2015/09/a757f6668031b80469d1f37b29ef4a70.jpg" alt="Design your logo" />
							</a>
						</div>
						<div class="col-xs-8 no-padding-right no-padding-left">
							<a href="#" title="Design your logo + business card + letterhead + envelope + compliment slip + fevicon" class="title clearfix">
								Design your logo + business card + let...    </a>
							<div class="details crop pull-left">
								<a data-hook="member-popover" data-seller-id="1035576" data-placement="left" data-seller-name="Umar K." rel="member-popover" href="#">Umar K.</a>    </div>
							<div class="price pull-right">
								<strong>
								$<span title="">62</span>        </strong>
							</div>
						</div>
						<div class="clearfix horizontal-line stretch"></div>
					</li>
                    <li class="clearfix">
						<div class="col-xs-4 no-padding-left no-padding-right image">
							<a title="Design Logos + Business cards + Letterhead + Envelope + Tshirt + Mug + Favicon" class="img-container" href="#">
								<img width="100%" height="100%" class="hourlie-image" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/hourliesAttachments/thumbs/110x83/2015/04/a807c13829ebca41981992ccc370fcc0.jpg" alt="Design Logos " />
							</a>
						</div>
						<div class="col-xs-8 no-padding-right no-padding-left">
							<a href="#" title="Design Logos + Business cards + Letterhead + Envelope + Tshirt + Mug + Favicon" class="title clearfix">
								Design Logos + Business cards + Letter...    
							</a>
							<div class="details crop pull-left">
								<a data-hook="member-popover" data-seller-id="863780" data-placement="left" data-seller-name="Alessia F." rel="member-popover" href="#">Alessia F.</a>    
							</div>
							<div class="price pull-right">
								<strong> $<span title="">30</span></strong>
							</div>
						</div>
						<div class="clearfix horizontal-line stretch"></div>
					</li>
				</ul>
			</div>
		</div>
		<br class="clear"/>    
		</aside>
	</div>
    
<?php get_footer();?>