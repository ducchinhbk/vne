<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookSession.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookRequest.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookResponse.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookSDKException.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookRequestException.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookRedirectLoginHelper.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/FacebookAuthorizationException.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/GraphObject.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/GraphUser.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/GraphAlbum.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/GraphSessionInfo.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/Entities/AccessToken.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/HttpClients/FacebookCurl.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/HttpClients/FacebookHttpable.php');
require_once(config_item('home_dir') . '/c/application/libraries/Facebook/HttpClients/FacebookCurlHttpClient.php');

require_once(config_item('home_dir'). '/wp-includes/class-phpass.php');
require_once(config_item('home_dir'). '/c/application/utils/HttpCallUtils.php');
require_once(config_item('home_dir'). '/c/application/utils/ViewUtils.php');
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookCurl;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;

class User extends CI_Controller
{

    private $app_id = '651313361641726';
    private $app_secret = '2b4fd78d7d3acdfcfff6e50c064b8f37';
    private $inClientId = '75c18x2d1j1vcr';
    private $inClientSecret = '249hzZ8HKnm5fOtL';

    private $default_redirectURL;
    private $helper;
    private $wp_hasher;
    private $callbackInLink = 'http://localhost/vneconomist/c/user/user/ilogin';
    private $homepage = 'http://localhost/vneconomist';
    private $activateLink = 'http://localhost/vneconomist/c/user/user/activate';

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('user_model');
        $this->load->model('user_cookie_model');

        // setting up email ===============================================
        $config['useragent'] = "Codeigniter";
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "vnupeconomist@gmail.com";
        $config['smtp_pass'] = "henryA@2";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['smtp_crypto'] = "ssl";

        $this->email->initialize($config);
        $this->email->from('vnupeconomist@gmail.com', 'VN UP TEST');

        // ==================================================================
        $this->default_redirectURL = config_item('base_url') . 'user/user';
        FacebookSession::setDefaultApplication($this->app_id, $this->app_secret);
        $this->helper = new FacebookRedirectLoginHelper($this->default_redirectURL);
        $this->wp_hasher = new PasswordHash(8, true);
    }

    public function index(){
        if(isset($_GET['redirect_to'])){
            $_SESSION['redirect_to'] = $_GET['redirect_to'];
        }
        $this->handleLogViaCookie();
        $this->login();
    }

    //function process normal user login
    public function login(){
        if(isset($_POST['LoginForm'])){
            $email = $_POST['LoginForm']['email'];
            $pass = $_POST['LoginForm']['password'];
            $remember_me = $_POST['LoginForm']['rememberMe'];
            $userObject = $this->user_model->validate_login($email, $pass);
            if(is_array($userObject)){ // > 0 is valid
                // UPDATE USER SESSION DATA
                $this->storeDataToUserSession($userObject);

                // HANDLE COOKIE DATA
                $this->handleCookie($userObject['ID'], $remember_me, 0);

                if(isset($_SESSION['redirect_to'])){
                    redirect($_SESSION['redirect_to']);
                }else{
                    redirect($this->homepage);
                }
            }else{
                echo "Sai username hoac password";
            }
        }else if(isset($_GET)){
            $this->form_validation->set_rules('LoginForm_email', 'Email', 'required');
            $this->form_validation->set_rules('text', 'text', 'required');

            $sess = $this->helper->getSessionFromRedirect();
            if(isset($sess)){
                $request = new FacebookRequest($sess, 'GET', '/me');
                $response = $request->execute();
                $graph = $response->getGraphObject(GraphUser::className());
                $name = $graph->getName();
                $email = $graph->getProperty('email');
                $id = $graph->getId();
                $image = 'https://graph.facebook.com/'. $id . '/picture?width=100';

                $args = array(
                    'name' => $name,
                    'email' => $email,
                    'image' => $image
                );
                $data = $args;
                $data['user_login'] = $args['name'];
                $data['user_email'] = ($args['email'] != null && !empty($args['email']))? $args['email'] : $id. '@facebook.com';
                $data['cus_avatar'] = $args['image'];
                $data['user_pass'] = $this->wp_hasher->HashPassword('12345');
                $userObject = $this->user_model->get_user($data);
                if($userObject == null){
                    $data['ID'] = $this->user_model->insert_user($data);

                    // UPDATE USER SESSION DATA
                    $this->storeDataToUserSession($data);

                    // send email cause this is new user
                    $this->sendmail($data['user_email'], 'WELCOME', array(
                        'name' => $data['user_login']
                    ));
                }else{
                    $data['ID'] = $userObject['ID'];

                    // UPDATE USER SESSION DATA
                    $this->storeDataToUserSession($userObject);
                }

                // HANDLE COOKIE DATA
                $this->handleCookie($data['ID'], false, 1);

                if(isset($_SESSION['redirect_to'])){
                    redirect($_SESSION['redirect_to']);
                }else{
                    redirect($this->homepage);
                }
            }else{
                $data['facebookLoginUrl'] = $this->helper->getLoginUrl();
            }

            $data['loginViaLinkin'] = 'https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='. $this->inClientId . '&redirect_uri='. $this->callbackInLink .'&state=DCEeFWf45A53sdfKef42afda4&scope=r_basicprofile%20r_emailaddress';

            $this->load->view('common/tpl_header');
            $this->load->view('user/tpl_login', $data);
            $this->load->view('common/tpl_footer');
        }
    }

    public function ilogin(){
        $url_POST = 'https://www.linkedin.com/uas/oauth2/accessToken';
        if(isset($_GET['code']) && isset($_GET['state'])){  // step 2
            // handle response code from linked in

            $code = $_GET['code'];
            $fields = array(
                'code' => $code,
                'grant_type' => urlencode('authorization_code'),
                'redirect_uri' => urlencode('http://localhost/vnup/c/user/user/ilogin'),
                'client_id' => urlencode($this->inClientId),
                'client_secret' => urlencode($this->inClientSecret)
            );
            $response = HttpCallUtils::makeHttpCall($url_POST, $fields, 'POST', null);
            $accessTokenObject = json_decode($response, true); // array data

            $user = HttpCallUtils::fetchBasicProfile($accessTokenObject['access_token']);
            $data['user_login'] = substr($user->emailAddress, 0, strpos($user->emailAddress, '@'));
            $data['user_email'] = $user->emailAddress;
            $data['cus_avatar'] = (isset($user->pictureUrl))? $user->pictureUrl : $this->homepage . '/upload/avatar/user_default.png';
            $data['user_pass'] = $this->wp_hasher->HashPassword('12345');
            $data['first_name'] = $user->firstName;
            $data['last_name'] = $user->lastName;
            $data['in_access_token'] = $accessTokenObject['access_token'];
            $data['in_token_expire'] = $accessTokenObject['expires_in'];

            $userObject = $this->user_model->get_user($data);
            if($userObject == null){
                $id = $this->user_model->insert_user($data);
                $data['ID'] = $id;

                // UPDATE USER SESSION DATA
                $this->storeDataToUserSession($data);

                // send Email cause this is new user
                $this->sendmail($data['user_email'], 'WELCOME', array(
                    'name' => $data['first_name']. ' ' . $data['last_name']
                ));
            }else if($userObject['ID'] > 0){
                $id = $userObject['ID'];

                // UPDATE USER SESSION DATA
                $this->storeDataToUserSession($userObject);
            }

            // UPDATE SESSION USER DATA
            $userSessionData = array();
            $userSessionData['user_email'] = $data['user_email'];
            $userSessionData['user_login'] = $data['user_login'];
            $userSessionData['user_first_name'] = $data['first_name'];
            $userSessionData['user_last_name'] = $data['last_name'];
            $userSessionData['user_id'] = $id;
            $this->session->set_userdata($userSessionData);

            // HANDLE COOKIE DATA
            $this->handleCookie($id, false, 1);

            // REDIRECT TO CURRENT PAGE
            redirect($_SESSION['redirect_to']);
        }
    }

    //function process normal user registration
    public function signup(){
        if(isset($_GET['redirect_to'])){
            $_SESSION['redirect_to'] = $_GET['redirect_to'];
        }

        $this->handleLogViaCookie();

        if(isset($_POST['EmailMemberRegistration'])){
            $data['first_name'] = $_POST['EmailMemberRegistration']['fname'];
            $data['last_name'] = $_POST['EmailMemberRegistration']['lname'];
            $data['user_email'] = $_POST['EmailMemberRegistration']['email'];
            $data['password'] = $_POST['EmailMemberRegistration']['password'];
            $data['memType'] = $_POST['EmailMemberRegistration']['memType'];
            $data['remember_me'] = true;

            $data['user_login'] = $data['first_name'] . '_' . $data['last_name'];
            $userObject = $this->user_model->get_user($data);
            if(isset($userObject) && isset($userObject['ID']) && $userObject['ID'] > 0){
                echo 'This email is already existed';
            }else{
                $data['user_pass'] = $this->wp_hasher->HashPassword(trim($data['password']));
                $data['user_activation_key'] = sha1(mt_rand(10000,99999).time(). $data['user_email']);
                $userID = $this->user_model->insert_user($data);

                $activateCode = $data['user_activation_key'];
                // send email
                $this->sendmail($data['user_email'], 'ACTIVATE', array(
                    'homepage' => $this->homepage,
                    'activateLink' => $this->activateLink .'?activate_code='. $activateCode
                ));

                // UPDATE SESSION USER DATA
                $data['ID'] = $userID;
                $this->storeDataToUserSession($data);

                // HANDLE COOKIE DATA
                $this->handleCookie($userID, 1, 0);

                // redirect to current URL
                echo 'Sign up successful . This page will be redirect in a second.';
                if(isset($_SESSION['redirect_to'])){
                    redirect($_SESSION['redirect_to']);
                }else{
                    redirect($this->homepage);
                }
            }
        }else if(isset($_GET)){
            $this->form_validation->set_rules('EmailMemberRegistration_fname', 'text', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_lname', 'text', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_email', 'email', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_password', 'password', 'required');
            $this->form_validation->set_rules('ytEmailMemberRegistration_memType', 'text', 'required');

            $sess = $this->helper->getSessionFromRedirect();
            if(isset($sess)){
                $request = new FacebookRequest($sess, 'GET', '/me');
                $response = $request->execute();
                $graph = $response->getGraphObject(GraphUser::className());
                $name = $graph->getName();
                $email = $graph->getProperty('email');
                $id = $graph->getId();
                $image = 'https://graph.facebook.com/'. $id . '/picture?width=30';
                $args = array(
                    'name' => $name,
                    'email' => $email,
                    'image' => $image
                );
                // insert new user into database
                $data = $args;
                $data['user_login'] = $args['name'];
                $data['user_email'] = ($args['email'] != null && !empty($args['email']))? $args['email'] : $id. '@facebook.com';
                $data['cus_avatar'] = $args['image'];
                $data['user_pass'] = $this->wp_hasher->HashPassword('12345');
                $userObject = $this->user_model->get_user($data);
                if($userObject == null){
                    $data['ID'] = $this->user_model->insert_user($data);

                    // UPDATE SESSION USER DATA
                    $this->storeDataToUserSession($data);

                    // send Email cause this is new user
                    $this->sendmail($data['user_email'], 'WELCOME', array(
                        'name' => $data['user_login']
                    ));
                }else{
                    // UPDATE SESSION USER DATA
                    $this->storeDataToUserSession($userObject);
                }

                $data['loginFacebookLink'] = '#';
                if(isset($_SESSION['redirect_to'])){
                    redirect($_SESSION['redirect_to']);
                }else{
                    echo 'Login via facebook successful! But missing redirect link to url';
                }
            }else{
                $data['loginFacebookLink'] = $this->helper->getLoginUrl();
            }

            $data['name'] = $this->session->userdata('name');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');
            $data['loginViaLinkin'] = 'https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='. $this->inClientId . '&redirect_uri='. $this->callbackInLink .'&state=DCEeFWf45A53sdfKef42afda4&scope=r_basicprofile%20r_emailaddress';

            $this->load->view('common/tpl_header');
            $this->load->view('user/tpl_signup', $data);
            $this->load->view('common/tpl_footer');
        }
    }

    //function process user activation
    public function activate(){
        if(isset($_GET['activate_code'])){
            $user = $this->user_model->getuser_by_activate_code($_GET['activate_code']);
            if(isset($user) && $user['ID'] > 0){
                $user['user_activation_key'] = '';
                $result = $this->user_model->update_user($user);
                if($result != null){
                    $this->sendmail($user['user_email'], 'WELCOME', array(
                        'name' => $user['user_login']
                    ));
                }
                // UPDATE SESSION USER DATA
                $this->storeDataToUserSession($user);

                $this->handleCookie($user['ID'], json_decode($this->input->cookie('vnup_user'))->remember_me, 0);

                echo 'Your account is activated! This page will redirect in seconds';
                flush();
                sleep(3);

                // redirect to ...
                redirect($this->homepage);
            }
        }
    }

    public function logout(){
        // REMOVE SESSION DATA
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('user_first_name');
        $this->session->unset_userdata('user_last_name');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('cus_avatar');
        unset($_SESSION['user_data']);

        // REMOVE SESSION WP
        if(isset($_SESSION['wp_user_data'])){
            unset($_SESSION['wp_user_data']);
        }

        // REMOVE COOKIE DATA
        delete_cookie('vnup_user', '.localhost', '/');

        // REMOVE COOKIE USER LOGIN VIA SOCIAL
        delete_cookie('vnup_log_social', '.localhost', '/');

        if(isset($_GET['redirect_to'])){
            redirect($_GET['redirect_to']);
        }else if(isset($_SESSION['redirect_to'])){
            redirect($_SESSION['redirect_to']);
        }else{
            redirect($this->homepage);
        }
    }

    //function send mail to user
    private function sendmail($email, $type, $data = array()){
        $subject = '';
        $messageBody = '';
        if($type == 'WELCOME'){
            $subject = 'WELCOME TO VNUP';
            $filePath = config_item('home_dir'). '/c/application/views/themes/default/template/email/welcome.tpl';
            $messageBody = ViewUtils::loadTemplate($filePath, $data);
        }else if($type == 'ACTIVATE'){
            $subject = 'Thank you for signup VNUP';
            $filePath = config_item('home_dir'). '/c/application/views/themes/default/template/email/activate.tpl';
            $messageBody = ViewUtils::loadTemplate($filePath, $data);
        }
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($messageBody);
        $this->email->send();
    }

    function setUserDataToCookie($data){
        $cookie = array(
            'name'   => 'user',
            'value'  => json_encode($data),
            'expire' => time()+ 85200,
            'domain' => '.localhost',
            'path'   => '/',
            'prefix' => 'vnup_',
        );
        set_cookie($cookie);
    }

    function handleCookie($userID, $remember_me, $loginViaSocial){
        // UPDATE TO DB USER COOKIE DATA
        $userToken = sha1(mt_rand(10000,99999).time(). $userID);
        $dataInsertCookie['user_token'] = $userToken;
        $dataInsertCookie['user_ip'] = $this->input->ip_address();
        $dataInsertCookie['user_agent'] = $this->input->user_agent();
        $dataInsertCookie['ID'] = $userID;
        $this->user_cookie_model->insert($dataInsertCookie);

        // SET TO COOKIE DATA
        $userCookieData['user_token'] = $userToken;
        $userCookieData['remember_me'] = $remember_me;
        $this->setUserDataToCookie($userCookieData);

        // SET TO COOKIE LOGIN VIA SOCIAL
        $cookie = array(
            'name'   => 'log_social',
            'value'  => $loginViaSocial,
            'expire' => 86400, // 1 day
            'domain' => '.localhost',
            'path'   => '/',
            'prefix' => 'vnup_',
        );
        set_cookie($cookie);
    }

    private function handleLogViaCookie(){
        // HANDLE LOGIN USER && INIT SESSION && REDIRECT
        if(isset($_COOKIE['vnup_user'])){
            $cookieVnupUser = $_COOKIE['vnup_user'];
            $index1 = strrpos($cookieVnupUser, 'user_token') + strlen('user_token') + 3;
            $index2 = strrpos($cookieVnupUser, 'remember_me') - 3;
            $index3 = strrpos($cookieVnupUser, 'remember_me') + strlen('remember_me') + 3;

            $user_token = substr($cookieVnupUser, $index1, $index2 - $index1);
            $remember_me = substr($cookieVnupUser, $index3, 1);
            if($remember_me == '1' ||
                (isset($_COOKIE['vnup_log_social']) && $_COOKIE['vnup_log_social'] == '1') ){
                $dbUserToken = $this->user_cookie_model->get_user_cookie(
                    $user_token,
                    $this->input->user_agent(),
                    $this->input->ip_address());
                if(isset($dbUserToken)){
                    $dataUserData = array(
                        'user_login' => $dbUserToken['user_login'],
                        'user_email' => $dbUserToken['user_email'],
                        'user_fname' => $dbUserToken['first_name'],
                        'user_lname' => $dbUserToken['last_name'],
                        'user_id' => $dbUserToken['ID']
                    );
                    $this->session->set_userdata($dataUserData);

                    if(isset($_SESSION['redirect_to'])){
                        redirect($_SESSION['redirect_to']);
                    }else{
                        redirect($this->homepage);
                    }
                }
            }
        }
    }
    //method edit profile
     public function edit(){
        if(isset($_SESSION['user_id']) && $this->session->user_id > 0 && isset($_COOKIE['vnup_user'])){

            $data = array();
            // TODO: more code here

            $this->load->view('common/tpl_header');
            $this->load->view('user/tpl_edit_profile', $data);
            $this->load->view('common/tpl_footer');
        }else{
            redirect($this->homepage . '/c/user/user');
        }
    }

    public function uploadfile(){
        header('Content-Type: application/json');
        if(isset($_SESSION['user_id']) && $this->session->user_id > 0 && isset($_COOKIE['vnup_user'])){
            $result = array();
            if(isset($_POST['image_type']) && isset($_FILES['coverfile'])){
                $target_dir = config_item('home_dir'). '/upload/cover/';
                $target_file = $target_dir . basename($_FILES["coverfile"]["name"]);

                $check = getimagesize($_FILES["coverfile"]["tmp_name"]);
                if($check){
                    $tempPath = $_FILES["coverfile"]["tmp_name"];
                    if(file_exists($target_file)){
                        $result['status'] = true;
                        $result['coverUrl'] = $this->homepage . '/upload/cover/'. basename( $_FILES["coverfile"]["name"]);
                    }else{
                        $isOk = move_uploaded_file($tempPath, $target_file);
                        if ($isOk) {
                            $result['status'] = true;
                            $result['coverUrl'] = $this->homepage . '/upload/cover/'. basename( $_FILES["coverfile"]["name"]);
                        } else {
                            $result['status'] = false;
                            $result['message'] = 'Sorry, there was an error uploading your file';
                        }
                    }
                }else{
                    $result['status'] = false;
                    $result['message'] = 'Please choose image file';
                }
            }
            echo json_encode($result);
        }else{
            redirect($this->homepage);
        }
    }

    private function storeDataToUserSession($user){
        $userSessionData['user_id'] = $user['ID'];
        $userSessionData['user_login'] = $user['user_login'];
        $userSessionData['user_email'] = $user['user_email'];
        $userSessionData['user_display_name'] = (isset($user['display_name']))? $user['display_name'] : '' ;
        $userSessionData['cus_description'] = (isset($user['cus_description']))? $user['cus_description'] : '';
        $userSessionData['cus_avatar'] = $user['cus_avatar'];
        $userSessionData['cus_cover'] = $user['cus_cover'];
        $userSessionData['cus_quote'] = (isset($user['cus_quote']))? $user['cus_quote'] : '';
        $userSessionData['cus_career'] = (isset($user['cus_career']))? $user['cus_career'] : '';
        $userSessionData['cus_company'] = (isset($user['cus_company'])) ? $user['cus_company'] : '';
        $userSessionData['cus_city'] = (isset($user['cus_city']))? $user['cus_city']: '';
        $userSessionData['user_fname'] = (isset($user['first_name']))? $user['first_name'] : '';
        $userSessionData['user_lname'] = (isset($user['last_name']))? $user['last_name'] : '';
        $this->session->set_userdata($userSessionData);
    }

}