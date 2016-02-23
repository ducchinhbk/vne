<?php
/*
Template Name: Language
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    wp_redirect( home_url() ); exit; 
}

$lang_code =  $_POST['language'];
$redirectUrl = $_POST['redirectUrl'];

setcookie('language', $lang_code, time() + (86400 * 365), "/");// 1 year
wp_redirect( $redirectUrl ); exit; 