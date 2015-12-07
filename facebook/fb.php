<?php
/**
 * Include All Facebook SDK 
 *
 * file fb.php
 */
define('ROOT_DIR', 'C:\wamp\www\vneconomist');
 
require_once(ROOT_DIR . '/facebook/Facebook/FacebookSession.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookRequest.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookResponse.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookSDKException.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookRequestException.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookRedirectLoginHelper.php');
require_once(ROOT_DIR . '/facebook/Facebook/FacebookAuthorizationException.php');
require_once(ROOT_DIR . '/facebook/Facebook/GraphObject.php');
require_once(ROOT_DIR . '/facebook/Facebook/GraphUser.php');
require_once(ROOT_DIR . '/facebook/Facebook/GraphAlbum.php');
require_once(ROOT_DIR . '/facebook/Facebook/GraphSessionInfo.php');
require_once(ROOT_DIR . '/facebook/Facebook/Entities/AccessToken.php');
require_once(ROOT_DIR . '/facebook/Facebook/HttpClients/FacebookCurl.php');
require_once(ROOT_DIR . '/facebook/Facebook/HttpClients/FacebookHttpable.php');
require_once(ROOT_DIR . '/facebook/Facebook/HttpClients/FacebookCurlHttpClient.php');
