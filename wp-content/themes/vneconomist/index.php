<?php
/**
 * The template for displaying Home page.
 *
 * @file      index.php
 * @package   VnUp news
 * @author    Chinh Tran
 * 
 **/
 ?>
 <?php 
      if(!isset($_COOKIE['language'])) {
          setcookie('language', 'en', time() + (86400 * 365), "/");// 1 year
      } 
 ?> 
    
<?php get_header(); ?>
 <?php
 
 switch($_COOKIE['language']) {
    case 'en':
        get_template_part('templates/en_home', '');
        break;
    case 'vi':
        get_template_part('templates/vi_home', ''); 
        break;
    default:
        get_template_part('templates/en_home', '');
        break;
}
?>

<?php get_footer();?>