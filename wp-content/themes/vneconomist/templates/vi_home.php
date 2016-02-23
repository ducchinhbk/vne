
<div class="container container-top"></div>
<div id="home-page" class="home-container clearfix fullheight">
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
                        <div class="caption-header">Đề xuất giải pháp</div>
                        <div class="caption-text">Super fast with Guaranteed Results</div>            
                    </div>
                </div>
                <div class="item">
                    <div class="fill slide-02"></div>
                    <div class="carousel-caption">
                        <div class="caption-header">Vì thế giới tốt đẹp hơn</div>
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
                    <div class="clearfix" id="get-started" >
                        <div class="col-sm-12 no-padding-left box-writing">
                            Write good things to make the world better..
                        </div>
                        <div class="col-sm-2 no-padding-left">
                            <a href="<?php echo site_url( '/c/user/article/create' );?>" class="btn call-to-action btn-inverted write-btn"  value="Start a solution ›">Start a solution ›</a>
                        </div>
                    </div> 
                    <!--a href="<?php echo site_url( '/c/user/article/create' );?>" class="btn call-to-action btn-inverted write-btn"  value="Let&#039;s Go ›">Let&#039;s Go ›</a-->  
                </div>
            </div>
        </div>
    </section>
</div>
<div id="colection-wrapper" class="colection-wrapper">
    <div class="container container">
        <div class="col-md-12 col-lg-12 ta-center">
            <div class="hp-collection hp-tour-in">
              <div class="section-title container section-title-thin ta-center">Bộ sưu tập bài viết nổi bật</div>
              <div class="row">
                <?php $collections = get_collections(0, 12); 
                      foreach($collections as $collection){ ?>
                
                        <div class="col-xs-12 col-md-4 col-lg-3 collection-item">
                          <div class="collection-box collection-box-snippet"> 
                              <a href="<?php echo esc_url(site_url().'/bo-suu-tap/'.$collection['slug']); ?>" title="<?php echo $collection['name']?>">
                                  <h4 class="collections-title" > 
                                      <span class="collections-title_outlets"><?php echo $collection['count']?> Bài viết</span> 
                                      <span class="collections-title_text"><?php echo $collection['name']?></span> 
                                  </h4>
                                  <div class="collection-box-bg lazy"  style="background-image: url('<?php echo c_crop_image_resize(get_collec_thumb($collection['slug']), 400, 115, true); ?>');">
                                    <div class="collection-overlay"></div>
                                  </div>
                              </a> 
                          </div>
                          <div class="clear"></div>
                        </div>
                
                <?php } ?>
                
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
                        Nổi bật trong ngày 
                    </h1>
                </header>      
            </div>
            <div class="results grid" id="hourlies-listing-results">
                <div id="hourlies-listing-listview" class="list-view">
                    <div class="items clearfix items-results ">
                        <?php   
                            $args = array(
                                'posts_per_page' => 16
                            );
                            $the_query = new WP_Query($args);
                            if ( $the_query->have_posts() ) {
                           	    while ( $the_query->have_posts() ) {
                              		$the_query->the_post();
                                    $user_info = get_userdata(get_the_author_ID()); 
                                    $full_name = $user_info->first_name.' '.$user_info->last_name;
                                    $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                                    $avatar_url =  c_avatar($user_info->cus_avatar);
                                    //echo $avatar_url; exit;
                                    ?>
                                    <div class="col-xs-12 col-sm-4 col-md-3 hourlie-tile-container">
                                        <div class="clearfix hourlie-tile js-listing-tile  with-member-info">
                                            <span data-res-id="302636"  data-entity-id="302636" data-entity-type="WISHLIST" data-in-wtt="false" class="bookmark fpph-bookmark login-require" title="Lưu vào"></span>
                                            <div class="image-container">
                                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="img-grid">        
                                                    <img width="253" height="195" src="<?php echo c_crop_image_resize($url, 253, 195, true); ?> " class="attachment-253x195 wp-post-image" alt="Capture"/>       
                                                    <span class="circle">5,0</span>
                                                </a>
                                            </div>
                                            <div class="title-container">
                                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="color-hourlie js-paragraph-crop" style="word-wrap: break-word;font-weight: bold;">
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
                            <?php } 
                            } else { ?>
                                <p><?php _e('Không có bài viết hiển thị..'); ?></p>
                        
                            <?php } ?>
                        <!-- End Loop -->
                   
                    </div>
                </div>    
            </div>
        </section>
    </div>
</div>