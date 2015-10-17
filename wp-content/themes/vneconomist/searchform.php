<?php
/**
 * The template for displaying search form page.
 *
 * @file      searchform.php
 * @package   VnEconomist news
 * @author    Chinh Tran
 * 
 **/
?>

<form id="hd-search-form" class="hd-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
    <div class="clearfix search-container" id="job-listing-search">
        <div class="input-group clearfix ">
            <input id="keyword" placeholder="Tìm kiếm..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="form-control" type="text"/>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default js-submit-search">
                <i class="fa fa-search"></i>
            </button>
        </span>
        </div>
    </div>
</form>

