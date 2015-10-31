<?php
require_once config_item('home_dir') . '/c/application/utils/CommonUtils.php';
?>

<div class="container container-top">
    <?php if(isset($_GET['cp'])){?>
        <div class="cmm-announcement clearfix"  style="overflow: hidden; display: block;">
            <p>
                <a target="blank" href="#" class="announcement-click call-to-action">Bài viết đã được tạo thành công..! </a>
            </p>
            <i class="fa fa-times" id="noted-close"></i>
            <script>
                $(document).ready(function() {
                    $('#noted-close').click(function(){
                        $('.cmm-announcement').remove();
                    });
                });
            </script>
        </div>
    <?php } ?>
</div>
<div id="main-container" class="wrap-container container clearfix">
    <div class="main-content full-width controller-member action-profile no-padding">

<div class="clearfix profile-header profile-header-cover">
    <div class="profile-background col-xs-12 hidden-xs no-padding">
        <div class="background-wrapper">
            <div class="memberImage" style="background-image: url('<?php echo config_item('wp_home_url'). '/'. $reviewUser['cus_cover']; ?>');"></div>
        </div>
    </div>
    <div class="profile-header-fav">
        <div class="fav-triangle">

        </div>
        <div class="fav-icon">
            <div style="display: inline-block; margin-top: 0;" class="widget-star-item ">
                <a href="#"><span></span></a>
            </div>
        </div>
    </div>
    <?php
        $userAvatar = $reviewUser['cus_avatar'];
        if(strpos($userAvatar, 'http') === false){
            $userAvatar = config_item('wp_home_url') . '/'. $reviewUser['cus_avatar'];
        }
    ?>
    <div class="profile-header-xs visible-xs-block hidden-sm">
        <div class="profile-availability">
            <i class="js-tooltip status-icon fa fa-circle green"></i>
        </div>
        <div class="profile-pic">
            <img alt="<?= $reviewUser['display_name']?>" src="<?= $userAvatar ?>">
            <span title="Savitri D. is available to start working for you immediately" class="hidden-xs available  js-tooltip">
                <i class="icon fa fa-check"></i>
            </span>
        </div>

        <div class="profile-cert">
            <span title="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" data-tooltip-content="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-level="5" class="cert cert-level5-medium ">
            </span>
        </div>
        <div class="clearfix member-info">
            <span class="member-name">
                <?= $reviewUser['user_nicename']; ?>
            </span>
            <span class="member-description">
                <?= $reviewUser['cus_career']; ?>
            </span>

        </div>
        <div class="member-location-rate">
            <ul>
                <li>
                    <i class="fpph fpph-location"></i>
                    <?= $reviewUser['cus_city']; ?>
                </li>
                <li>
                    <i class="fpph fpph-seller-activity"></i>
                    $44 /hr
                </li>
            </ul>
            <div class="member-available">
                <ul>
                    <li>
                        <i title="Savitri D. is available to start working for you immediately" class="status-icon fa fa-check-circle green js-tooltip"></i>
                        <span class="status-label-text">Available now</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="member-about clearfix">
            <div class="member-status text-center">
                <q title="Everything come to you in the right moment! Be patient!" class="crop full-width-q">
                    Everything come to you in the right moment! Be patient!
                </q>
            </div>
            <hr class="clearfix">
            <div class="about-container js-about-container">
                <p>
                   <?= $reviewUser['cus_description'];?>
                </p>
            </div>
        </div>

        <div class="member-hire">
            <span><a href="#" rel="nofollow" class="btn contact-member call-to-action btn-inverted ">Contact</a></span>
        </div>
    </div>
    <div class="profile-header-member hidden-xs">
        <div class="profile-pic">
            <img alt="<?= $reviewUser['display_name']?>" src="<?= $userAvatar ?>">
            <span data-original-title="Savitri D. is available to start working for you immediately" title="" class="hidden-xs available  js-tooltip">
                <i class="icon fa fa-check"></i>
            </span>
        </div>
        <div class="seller-name light">
            <h1>
                <?= $reviewUser['first_name']. ' '. $reviewUser['last_name']; ?>
                <aside>
                    <?= $reviewUser['cus_career']; ?>
                </aside>
            </h1>
        </div>
    </div>
    <?php if(isset($_SESSION['user_id']) && $reviewUser['ID'] == $_SESSION['user_id']){ ?>
        <div class="cover-edit-action hidden-xs">
            <a href="http://localhost/vneconomist/c/user/user/edit" class="btn cover-edit-button">
                <i class="fa fa-camera"></i> Change Cover
            </a>
        </div>
    <?php } ?>
    <div class="profile-header-right-col align-center hidden-xs">
        <div class="cert-container">
            <span title="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-tooltip-pos="left" data-tooltip-content="CERT is PPH's  proprietary ranking algorithm  which factors in all the things our buyers care about a Seller, in one synthetic score. Sellers are ranked from CERT1 up to CERT5 with the Top 0.5% getting a special badge." data-level="5" class="cert cert-level5-xlarge ">
            </span>
        </div>
        <!--span><a class="btn contact-member call-to-action btn-inverted " rel="nofollow" href="#">Contact</a></span-->
        <?php if(isset($_SESSION['user_id']) && $reviewUser['ID'] == $_SESSION['user_id']){ ?>
            <a href="http://localhost/vneconomist/c/user/user/edit" rel="nofollow" class="btn contact-member call-to-action  ">Edit</a>
        <?php } ?>
    </div>
</div>
<div class="member-info-container">
<div class="col-xs-12 col-sm-4 col-lg-3 profile-sidebar hidden-xs">
    <div class="sidebar-box clearfix hidden-xs">
        <div class="member-status">
            <q title="Everything come to you in the right moment! Be patient!" class="crop full-width-q">Everything come to you in the right moment! Be patient!</q>
        </div>
        <hr>
        <p>
        </p>
        <div class="about-container js-about-container">
            <p>
                <?= $reviewUser['cus_description']; ?>
            </p>
        </div>
        <div class="clearfix">
            <ul class="clearfix details-list">
                <li>
                    <i class="fpph fpph-location"></i>
                    <?= $reviewUser['cus_city']?>
                </li>
                <li class="">
                    <i title="Savitri D. is available to start working for you immediately" class="status-icon fa fa-check-circle green js-tooltip"></i>
                    <span class="status-label-text">Available now</span>
                </li>
                <li>
                    <i class="js-tooltip status-icon fa fa-circle green"></i>
                    <span class="status-label-text">Online now</span>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-box gutter-top append-bottom hidden-xs">
        <div class="memStats-container">
            <h3 class="bubble dark">Ghi nhận</h3>
            <section data-hook="widget-memberStats" class="widget-memberStats">
                <div class="row memberStats-rating">
                    <div class="col-sm-8"> Rating
                        <span data-tooltip-content="Average feedback Tracy has received as a Seller." data-tooltip-pos="right" data-tooltip-style="info" class="icon help-active gray"></span>
                    </div>
                    <div class="col-sm-4 value text-right">
                        <strong> <span>99</span><sup>%</sup> </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        Bài viết
                    </div>
                    <div class="col-sm-3 value text-right">
                        <strong> 27 </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        Tổng số votes
                    </div>
                    <div class="col-sm-3 value text-right">
                        <strong> 259 </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        Last project
                    </div>
                    <div class="col-sm-6 value text-right">
                        <strong> 12 Sep 2015 </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7" id="response-time">
                        Response time
                        <span data-tooltip-content=" The average time to reply when contacted by a Buyer" data-tooltip-pos="right" data-tooltip-style="info" class="icon help-active gray"></span>
                    </div>
                    <div class="col-sm-5 value text-right">
                        <strong> within a few hours </strong>
                    </div>
                </div>
                <div class="clearfix row memStats-toggle" id="memStats-toggle">
                    <a class="statistics col-xs-12 call-to-action">
                        <i class="fa fa-bar-chart-o"></i>
                        View my Buyer Stats
                    </a>
                </div>
            </section>
        </div>
    </div>
    <div class="member-summary">
        <div class="clearfix gutter-top">
            <div class="lifted-corners with-handles">
                <div class="handles"></div>
                <div class="all-badges-container">
                    <div class="cert-badge">
                        <span data-level="5" class="cert cert-level5-medium "></span>
                    </div>
                    <div class="widget-member-prizes">
                        <img alt="Top Endorsed" src="https://d3v9w2rcr4yc0o.cloudfront.net/uploads/prizes/badges/ffdd1b856a16c89191f1150e4430076b.png" title="Top Endorsed" class="prize">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix sidebar-box gutter-top hidden-xs">
        <h3 class="bubble">Quan tâm</h3>
        <div class="clearfix widget-tag-list">
            <a href="#" class="tag-item small">Academic writing</a>
            <a href="#" class="tag-item small">Dissertation writing</a>
            <a href="#" class="tag-item small">Research writing</a>
            <a href="#" class="tag-item small">Article</a>
            <a href="#" class="tag-item small">Reviews writing</a>
            <a href="#" class="tag-item small">Fitness writing</a>
            <a href="#" class="tag-item small">Health writing</a>
            <a href="#" class="tag-item small">Medical writing</a>
            <a href="#" class="tag-item small">EBook writing</a>
            <a href="#" class="tag-item small">Biostatistics</a>
            <a class="tag-item js-show-more-tags" href="#">
                <span class="call-to-action">+2</span>
            </a>
            <div style="display: none;" class="js-more-tags">
                <a href="#" class="tag-item small">Quantitative analysis</a>
                <a href="#" class="tag-item small">Statistics</a>
            </div>
        </div>
    </div>


    <div class="member-certificates"></div>
</div>
<div class="col-xs-12 col-sm-8 col-lg-9 profile-main">
<div class="member-tabs pph-default stretch gutter-bottom hidden-xs" id="members-widget-hourlies-portfolio">
<ul class="nav nav-tabs" role="tablist">
    <li class="active">
        <a href="#my-post" data-toggle="tab" role="tab">Bài viết (<?= $total; ?>)</a>
    </li>
    <li>
        <a href="#my-colection" data-toggle="tab" role="tab">Bộ sưu tập</a>
    </li>
    <li>
        <a href="#my-bookmark" data-toggle="tab" role="tab">Đã lưu</a>
    </li>
    <li>
        <a href="#my-friend" data-toggle="tab" role="tab">Bạn bè</a>
    </li>
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="my-post">
<div class="clearfix">
<div class="col-xs-12">
    <a style="margin-bottom: 20px;" class="my-hourlies-viewall call-to-action right"></a>
</div>

<!-- The Loop -->
<div id="paginationBody">
<?php $index = 0; ?>
<?php if(sizeof($postAuthors) > 0) { ?>
<?php foreach($postAuthors as $post){ ?>
    <div class="col-xs-12 col-sm-6 col-md-4 hourlie-tile-container">
        <div class="clearfix hourlie-tile js-listing-tile  with-member-info">
            <div class="image-container">
                <a class="" title="<?= $post['title'];?>" href="<?php echo config_item('wp_home_url') .'/'. CommonUtils::remove_vietnamese_accents($post['title']). '_post-'. $post['post_id']. '.html'?>">
                    <img width="260" height="124" alt="Capture" class="attachment-260x195 wp-post-image" src="<?php echo config_item('wp_home_url'). '/wp-content/uploads/'. $post['thumb_img']?>">
                </a>
                <div class="stats-container clearfix">
                    <div class="pull-left rating">
                        <i class="fpph fpph-thumb-up"></i>
                        <span>Vote:</span>
                        <span class="rating-value"><?= (isset($post['post_vote']))? $post['post_vote']: 99 ?></span>
                    </div>
                    <div class="pull-right sales">
                        <i class="fpph fpph-buyer-activity"></i>
                        <span>View:</span>
                        <span class="sales-value">1999</span>
                    </div>
                </div>
            </div>
            <div class="title-container">
                <a style="word-wrap: break-word;" class="color-hourlie js-paragraph-crop" title="<?= $post['title'];?>" href="<?php echo config_item('wp_home_url') .'/'. CommonUtils::remove_vietnamese_accents($post['title']). '_post-'. $post['post_id']. '.html'?>">
                    <?= $post['title']; ?>
                </a>
            </div>
            <div class="profile-container stretch clearfix">
                <div class="col-xs-8 no-padding-right">
                    <div class="user-image-container pull-left">
                        <?php $authorAvatar = $post['author_avatar'];
                              if(strpos($authorAvatar, 'http') === false){
                                  $authorAvatar = config_item('wp_home_url'). '/'. $authorAvatar;
                              }
                        ?>
                        <a title="<?= $post['author']?>">
                            <img width="30" height="30" alt="<?= $post['author']?>" src="<?= $authorAvatar;?>" class="user-avatar user-avatar-xs">
                        </a>
                    </div>
                    <div class="user-info pull-left">
                        <a class="clearfix user-name crop" title="<?= $post['author']?>"><?= $post['author']?></a>
                        <span class="user-country clearfix crop"><?= $post['cus_city'];?></span>
                    </div>

                </div>
                <div style="font-size: 12px;line-height: 2.5;" class="col-xs-4 price-container price-tag text-right">
                    <span><?php echo (isset($post['post_vote']))? $post['post_vote'] : 30 ;?></span><sup> votes</sup>
                </div>
            </div>
        </div>
    </div>
<?php $index++; }}else{ ?>
    <?php if(isset($_SESSION['user_id']) && $reviewUser['ID'] == $_SESSION['user_id']){ ?>
        Hiện tại bạn chưa viết bài viết nào. <a href="#">Viết ngay</a>
    <?php } ?>
<?php } ?>
</div>
<!-- End Loop -->


<div class="clearfix"></div>
<div style="margin-top: 20px;" class="pager">
    <div class="pagination clearfix">
        <?php if($numPage > 1){ ?>
            <ul class="yiiPager" id="hourlies-listing-pager">
                <?php $index = 1;
                    foreach($paginations as $pagination){
                ?>
                <li class="hidden-xs" style="display: <?php echo ($pagination['show'])? '': 'none' ?>"><a title="Trang <?=$pagination['index']?>" class="<?= $pagination['class']?>" href="<?= $pagination['link']?>"><?=$index?></a></li>
                <?php $index++; } ?>
                <?php if($numPage > 5){ ?>
                    <li class=""><a title="Trang tiếp theo" class="next" href="<?php echo config_item('base_url'). 'user/personal/'. $reviewUsername . '?page='. ($page + 1) ; ?>"><i class="fa fa-angle-right"></i></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="my-colection">
    <div class="clearfix" id="user_collection_body">
        <div class="col-xs-12">
            <a style="margin-bottom: 20px;" class="my-hourlies-viewall call-to-action right"></a>
        </div>
        <div id="append_new_collect_div"></div>
        <?php foreach($user_collections as $collection){
            $collectionImage = 'http://media.foody.vn/res/g18/172685/prof/s256x160/foody-mobile--19-_hinhmob-jpg-207-635796577790000909.jpg';
            if(isset($collection['image']) && !empty($collection['image'])){
                $collectionImage = $collection['image'];
            }
            ?>
            <div class="profile-collection-item">
                <div class="profile-collection-main-img">
                    <a title="<?= $collection['collection_title'];?>" href="<?php echo config_item('base_url'). 'collection/collection/'. CommonUtils::remove_vietnamese_accents($collection['collection_title']) . '_'. ($collection['user_collection_id'] + $plus)*$multiple . '.html'; ?>">
                        <img title="<?= $collection['collection_description'];?>" alt="<?= $collection['collection_description'];?>" src="<?= $collectionImage; ?>">
                    </a>
                </div>
                <a class="profile-collection-title" href="<?php echo config_item('base_url'). 'collection/collection/'. CommonUtils::remove_vietnamese_accents($collection['collection_title']) . '_'. ($collection['user_collection_id'] + $plus)*$multiple ;?>" title="<?= $collection['collection_title'];?>"><?= $collection['collection_title']?></a>
                <div><span class="profile-collection-res-count">1</span> địa điểm</div>
                <?php if(isset($_SESSION['user_id']) && $reviewUser['ID'] == $_SESSION['user_id']){ ?>
                    <a class="profile-collection-bot-btn" href="javascript:void(0);" onclick="openDialogEditCollection(<?= $collection['user_collection_id']; ?>);">
                        <span class="fa fa-pencil"></span> Chỉnh sửa
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if(isset($_SESSION['user_id']) && $reviewUser['ID'] == $_SESSION['user_id']){ ?>
            <div class="profile-collection-item">
                <div class="profile-collection-main-img">
                    <a href="javascript:void(0)">
                        <img src="http://image.foody.vn/default/s256x160/no-image.png">
                    </a>
                    <a onclick="openDialogCollection();" class="profile-collection-bot-btn" href="javascript:void(0);">
                        <span class="fa fa-file-o"></span> + Tạo bộ sưu tập
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="tab-pane fade" id="my-bookmark">
    <div class="clearfix" id="">
        <div class="col-xs-12">
            <a style="margin-bottom: 20px;" class="my-hourlies-viewall call-to-action right"></a>
        </div>
        <p>Tính năng lưu bài viết đang xây dựng..</p>
    </div>
</div>
<div class="tab-pane fade" id="my-bookmark">
    <div class="clearfix" id="">
        <div class="col-xs-12">
            <a style="margin-bottom: 20px;" class="my-hourlies-viewall call-to-action right"></a>
        </div>
        <p>Tính năng bạn bè đang được phát triển..</p>

    </div>
</div>
</div>
</div>
<div id="members-widget-hourlies-portfolio-accordion" class="panel-group visible-xs tab-collapsed"></div>	        	    </div>
</div>
</div>
</div>
<!-- MODEL COLLECTION BOOPSTRAP -->
<div id="collectionDialogModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="channelDlActionTitle">
                    <i class="fa fa-edit"></i>Tạo bộ sưu tập
                </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="collectionDialogModalBody">
                    <form id="collection-form" method="post" action="addcollection">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Tên bộ sưu tập*</label>
                            </div>
                            <div class="col-sm-9">
                                <input id="titleCollection" type="text" name="post_data[title]" class="form-control" value="" placeholder="Ex: Đầu tư nhà đất"/>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col-sm-3">
                                <label>Mô tả bộ sưu tập</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="descriptionCollection" name="post_data[description]" placeholder="Mô tả ngắn về bộ sưu tập của bạn"></textarea>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px">
                            <div class="col-sm-3">
                                <label>Bảo mật</label>
                            </div>
                            <div class="col-sm-9">
                                <div style="float: left">
                                    <lable><input id="chkPublic" onclick="selectBM($(this), $('#chkPrivate'));" checked="checked" type="radio"/>Hiển thị với mọi người (public)</lable>
                                </div>
                                <div style="float: left; padding-left: 10px;">
                                    <lable><input id="chkPrivate" onclick="selectBM($(this), $('#chkPublic'));" type="radio"/>Chỉ với tôi (private)</lable>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <input onclick="$('#collection-form').submit();" type="submit" class="btn btn-primary" style="float: right" value="Tạo bộ sưu tập" />
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    var baseURL = '<?php echo config_item('base_url') ?>';
    var plus = <?= $plus ?>;
    var multiple = <?= $multiple; ?>;

    function openDialogCollection(){
        $('#collectionDialogModal').modal('show');
    }

    function selectBM(checkbox, anotherCheckbox){
        if($(checkbox).prop('checked')){
            $(anotherCheckbox).prop('checked', false);
        }
    }

    function validationAddCollection(){
        if($('#titleCollection').val().trim() == ''){
            return false;
        }else{
            return true;
        }
    }

    $(document).ready(function() {
        $(window).keydown(function(event){
            if( (event.keyCode == 13) && (validationAddCollection() == false) ) {
                event.preventDefault();
                return false;
            }
        });
    });

    $('#collectionDialogModal').ajaxForm({
        url : $(this).attr('action'),
        type : "POST",
        dataType : 'json',
        data : $(this).serialize(),
        beforeSubmit : function(arr, $form, options){
            var isShared = $('#chkPublic').prop('checked');
            arr.push({
                name : 'post_data[shared]',
                value:  isShared.toString()
            });
            return true;
        },
        success: function(json){
            if(json.status){
                var html = '';
                var image = 'http://media.foody.vn/res/g18/172685/prof/s256x160/foody-mobile--19-_hinhmob-jpg-207-635796577790000909.jpg';
                if(json.data.image != undefined && json.data.image.length > 0){
                    image = json.data.image;
                }
                html += '<div id="append_new_collect_div"></div>';
                html += '<div class="profile-collection-item">';
                html += '<div class="profile-collection-main-img">';
                html += '<a title="'+ json.data.title + '" href="'+ baseURL +'collection/collection/'+ foldToAssci(json.data.title) + '_'+ (json.data.user_collection_id + plus)*multiple +'" title="'+ json.data.title + '">';
                html += '<img title="'+ json.data.description + '" alt="'+ json.data.description + '" src="'+ image + '"></a>';
                html += '</div>';
                html += '<a class="profile-collection-title" href="'+ baseURL +'collection/collection/'+ foldToAssci(json.data.title) + '_'+ (json.data.user_collection_id + plus)*multiple +'" title="'+ json.data.title + '">'+ json.data.title + '</a>';
                html += '<div><span class="profile-collection-res-count">1</span> địa điểm</div>';
                html += '<a class="profile-collection-bot-btn" href="javascript:void(0)" onclick="openDialogEditCollection('+ json.data.user_collection_id +')">';
                html += '<span class="fa fa-pencil"></span> Chỉnh sửa</a></div>';

                $('#append_new_collect_div').replaceWith(html);
                $('#collectionDialogModal').modal('hide');
            }
        }
    });

    function openDialogEditCollection(collection_id){
        $.ajax({
            url : baseURL + 'user/personal/getcollection?id=' + window.btoa(collection_id),
            type : 'get',
            dataType : 'json',
            success : function(json){
                if(json.status){
                    $('#collectionDialogModal #titleCollection').val(json.data.collection_title);
                    $('#collectionDialogModal #descriptionCollection').val(json.data.collection_description);
                    if(json.data.shared == 1){
                        $('#collectionDialogModal #chkPublic').prop('checked', true);
                    }else{
                        $('#collectionDialogModal #chkPrivate').prop('checked', true);
                    }
                    $('#collectionDialogModal').modal('show');
                }
            }
        });
    }

</script>