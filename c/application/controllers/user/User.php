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
                $userSessionData['user_email'] = $email;
                $userSessionData['user_login'] = $userObject['user_login'];
                $userSessionData['user_id'] = $userObject['ID'];
                $userSessionData['user_image'] = $userObject['cus_avatar'];
                $this->session->set_userdata($userSessionData);

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
                    $userID = $this->user_model->insert_user($data);

                    // send email cause this is new user
                    $this->sendmail($data['user_email'], 'WELCOME', array(
                        'name' => $data['user_login']
                    ));
                }else{
                    $userID = $this->user_model->update_user($userObject);
                }
                // UPDATE USER SESSION DATA
                $userSessionData['user_email'] = $data['user_email'];
                $userSessionData['user_login'] = $data['user_login'];
                $userSessionData['user_id'] = $userID;
                $userSessionData['user_image'] = $image;

                $this->session->set_userdata($userSessionData);


                // HANDLE COOKIE DATA
                $this->handleCookie($userID, false, 1);

                if(isset($_SESSION['redirect_to'])){
                    redirect($_SESSION['redirect_to']);
                }else{
                    redirect($this->homepage);
                }
            }else{
                $data['facebookLoginUrl'] = $this->helper->getLoginUrl();
            }

            $data['name'] = $this->session->userdata('user_email');
            $data['email'] = $this->session->userdata('user_login');
            $data['image'] = $this->session->userdata('user_image');
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

                // send Email cause this is new user
                $this->sendmail($data['user_email'], 'WELCOME', array(
                    'name' => $data['first_name']. ' ' . $data['last_name']
                ));
            }else if($userObject['ID'] > 0){
                $id = $this->user_model->update_user($data);
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
        // UPDATE SESSION DATA
        if(isset($_GET['redirect_to'])){
            $_SESSION['redirect_to'] = $_GET['redirect_to'];
        }

        $this->handleLogViaCookie();

        if(isset($_POST['EmailMemberRegistration'])){
            $data['fname'] = $_POST['EmailMemberRegistration']['fname'];
            $data['lname'] = $_POST['EmailMemberRegistration']['lname'];
            $data['user_email'] = $_POST['EmailMemberRegistration']['email'];
            $data['password'] = $_POST['EmailMemberRegistration']['password'];
            $data['memType'] = $_POST['EmailMemberRegistration']['memType'];
            $data['remember_me'] = $_POST['EmailMemberRegistration']['remember_me'];

            $data['user_login'] = $data['fname'] . '_' . $data['lname'];
            $userObject = $this->user_model->get_user($data);
            if(isset($userObject) && isset($userObject['ID'])){
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
                    $this->user_model->insert_user($data);

                    // send Email cause this is new user
                    $this->sendmail($data['user_email'], 'WELCOME', array(
                        'name' => $data['user_login']
                    ));
                }
                // update user session data
                $this->session->set_userdata($data);
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
                $userSessionData = array();
                $userSessionData['user_email'] = $user['user_email'];
                $userSessionData['user_login'] = $user['user_login'];
                $userSessionData['user_first_name'] = $user['first_name'];
                $userSessionData['user_last_name'] = $user['last_name'];
                $userSessionData['user_id'] = $user['ID'];
                $this->session->set_userdata($userSessionData);

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
        $this->load->helper('wp');

        // REMOVE SESSION DATA
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('user_first_name');
        $this->session->unset_userdata('user_last_name');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_image');

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
        $this->load->helper('wp');
        
        $data['header_view'] = c_get_header();
        $this->load->view('user/tpl_edit_profile', $data);
        $this->load->view('common/tpl_footer');
    }
}