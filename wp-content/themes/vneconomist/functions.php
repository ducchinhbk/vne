<?php
defined('ABSPATH') or die("No script kiddies please!");
add_theme_support( 'post-thumbnails' );

//custom image size
add_image_size( 'featured-slide-img', 658, 311, true );
//add_image_size('featured-slide-img', 658, 311, true);
add_image_size( 'featured-slide-img', 9999, 311, false );

add_image_size( 'mid-image', 175, 92, true );

// register menu
register_nav_menu('category-menu',__( 'Category Menu' ));

//get background image
function get_bg_resize_image($postID, $size)
{
    if ( has_post_thumbnail() ){
        $image_link = wp_get_attachment_image_src(get_post_thumbnail_id($postID), array(175, 92));
        $image_link = $image_link[0]; 
    }
    else 
    {
        $image_link = "/wp-content/themes/enang/images/img_default.jpg";
    }
    return $image_link;
}

//get background image
function get_bg_image($postID)
{
    if ( has_post_thumbnail() ){
        $image_link = wp_get_attachment_url(get_post_thumbnail_id($postID));
    }
    else 
    {
        $image_link = "/wp-content/themes/enang/images/img_default.jpg";
    }
    return $image_link;
}

//get Vietnamese date time
function sw_get_current_weekday() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday.', '.date('d/m/Y | H:i');
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

												

function get_tag_keyword()
{
    $posttags = get_the_tags();
    $keyword = '';
    if ($posttags) {
      foreach($posttags as $tag) {
        $keyword = $keyword . $tag->name . ', '; 
      }
    }
    return $keyword;
}
												 
function get_relate_catID($catID){
    $allCat = array(0=>'4', 1=>'68', 2=>'3', 3=>'5', 4=>'69', 5=>'8', 6=>'2', 7=>'71', 8=>'74');
    $key = array_search($catID, $allCat);
     
     $result = array();
     for( $i = 0; $i < count($allCat); $i++ ){
        if( count($result) < 4 ){
            $element = ($key + 1)%count($allCat);
            array_push($result, $allCat[$element]);
        }
        $key++;
     }
     return $result;
}												

function get_sub_string($string, $num = 0)
{
    $str_array = explode(' ', $string);
    $result = '';
    
    if(count($str_array) < $num)
    {
        $result =  $string;
    }
    else{
        for($i = 0; $i < $num; $i++)
        {
            $result = $result.' '. $str_array[$i];
        }
    }
    
    return $result;
}

function c_get_avatar($user_id, $width = 30, $height = 30, $class=""){
    
    $userData = get_userdata( $user_id );
    $avatar = c_crop_image_resize(site_url($userData->cus_avatar), $width, $height, true);
    //var_dump($userData);
    $full_name = get_user_meta( $userData->ID, 'first_name', true ).' '.get_user_meta( $userData->ID, 'last_name', true );
    
    $result = '<img class="'.$class.'" src="'. esc_url($avatar).'" alt="'. $full_name.'" width="'.$width.'" height="'.$height.'"/> ';
    
    return $result;
}													

//crop image size by url													
function c_crop_image_resize( $url, $width = NULL, $height = NULL, $crop = true, $retina = false ) {
		global $wpdb;
		if ( empty( $url ) )
			return new WP_Error( 'no_image_url', __( 'No image URL has been entered.','wta' ), $url );
		// Get default size from database
		$width = ( $width )  ? $width : get_option( 'thumbnail_size_w' );
		$height = ( $height ) ? $height : get_option( 'thumbnail_size_h' );
		  
		// Allow for different retina sizes
		$retina = $retina ? ( $retina === true ? 2 : $retina ) : 1;
		// Get the image file path
		$file_path = parse_url( $url );
        //var_dump($file_path); exit;
		$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
		//echo $file_path; exit;
		// Check for Multisite
		if ( is_multisite() ) {
			global $blog_id;
			$blog_details = get_blog_details( $blog_id );
			$file_path = str_replace( $blog_details->path . 'files/', '/wp-content/blogs.dir/'. $blog_id .'/files/', $file_path );
		}
		// Destination width and height variables
		$dest_width = $width * $retina;
		$dest_height = $height * $retina;
		// File name suffix (appended to original file name)
		$suffix = "{$dest_width}x{$dest_height}";
		// Some additional info about the image
		$info = pathinfo( $file_path );
		$dir = $info['dirname'];
		$ext = $info['extension'];
		$name = wp_basename( $file_path, ".$ext" );
        
        if ( 'bmp' == $ext ) {
			return new WP_Error( 'bmp_mime_type', __( 'Image is BMP. Please use either JPG or PNG.','wta' ), $url );
		}
		// Suffix applied to filename
		$suffix = "{$dest_width}x{$dest_height}";
		// Get the destination file name
		$dest_file_name = "{$dir}/{$name}-{$suffix}.{$ext}";
		if ( !file_exists( $dest_file_name ) ) {
		  
			// Load Wordpress Image Editor
			$editor = wp_get_image_editor( $file_path );
			if ( is_wp_error( $editor ) )
			{	
			     return array( 'url' => $url, 'width' => $width, 'height' => $height );
            }
			// Get the original image size
			$size = $editor->get_size();
			$orig_width = $size['width'];
			$orig_height = $size['height'];
			$src_x = $src_y = 0;
			$src_w = $orig_width;
			$src_h = $orig_height;
            
			if ( $crop ) {
			
				$cmp_x = $orig_width / $dest_width;
				$cmp_y = $orig_height / $dest_height;
				// Calculate x or y coordinate, and width or height of source
				if ( $cmp_x > $cmp_y ) {
					$src_w = round( $orig_width / $cmp_x * $cmp_y );
					$src_x = round( ( $orig_width - ( $orig_width / $cmp_x * $cmp_y ) ) / 2 );
				}
				else if ( $cmp_y > $cmp_x ) {
					$src_h = round( $orig_height / $cmp_y * $cmp_x );
					$src_y = round( ( $orig_height - ( $orig_height / $cmp_y * $cmp_x ) ) / 2 );
				}
			}
			// Time to crop the image!
			$editor->crop( $src_x, $src_y, $src_w, $src_h, $dest_width, $dest_height );
			// Now let's save the image
			$saved = $editor->save( $dest_file_name );
			// Get resized image information
			$resized_url = str_replace( basename( $url ), basename( $saved['path'] ), $url );
            
		}
		else {
		
			$resized_url = str_replace( basename( $url ), basename( $dest_file_name ), $url );
				
		}
		// Return image array
		return $resized_url;
	}											
												
													
														
												
												
											
									
									