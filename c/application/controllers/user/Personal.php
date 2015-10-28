<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

    private $reviewAuthorID;
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('collection_model');
        $this->load->model('post_model');

        // Review this code ... not nessesarry
        if(!isset($_SESSION['user_id']) || $this->session->user_id <= 0 || !isset($_COOKIE['vnup_user'])){
            redirect(config_item('wp_home_url'));
        }
        $this->reviewAuthorID = $_SESSION['user_id'];
    }
	public function index(){
        $data['user_collections'] = $this->collection_model->getListCollectionBy(1, 30, $_SESSION['user_id']);

        $page = 1; $limit = 12;
        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }
        $authorPosts = $this->post_model->getPostByAuthorId($page, $limit, $this->reviewAuthorID);
        $data['postAuthors'] = array();
        foreach($authorPosts as $post){
            $thumbImg = $this->post_model->getPostThumbImage($post['ID']);
            $data['postAuthors'][] = array(
                'title' => $post['post_title'],
                'date' => $post['post_date'],
                'author' => $post['user_nicename'],
                'author_id' => $post['post_author'],
                'author_email' => $post['user_email'],
                'post_id' => $post['ID'],
                'thumb_img' => $thumbImg,
                'author_nicename' => $post['user_nicename'],
                'author_avatar' => $post['cus_avatar'],
                'cus_city' => $post['cus_city']
            );
        }

        $data['plus'] = config_item('plus');
        $data['multiple'] = config_item('multiple');

		$this->load->view('common/tpl_header');
        $this->load->view('user/tpl_personal', $data);
        $this->load->view('common/tpl_footer');
	}

    public function addcollection(){
        header('Content-Type: application/json');
        $result = array();
        if(isset($_POST['post_data'])){
            $post_data = $_POST['post_data'];
            if(is_array($post_data)){
                $data['title'] = $post_data['title'];
                $data['description'] = $post_data['description'];
                $data['shared'] = ($post_data['shared'] == 'true')? 1: 0 ; // TRUE OR FALSE
                $data['user_id'] = $_SESSION['user_id'];

                $collectionObject = $this->collection_model->getCollectionByDataFilter($data);
                if($collectionObject != null && $collectionObject['user_collection_id'] > 0){
                    // allredy existed bo suu tap nay`
                    $result['status'] = false;
                    $result['message'] = 'Tên bộ sưu tập đã tồn tại, làm ơn chọn tên khác';
                }else{
                    $collectionObject = $this->collection_model->insert($data);
                    $result['status'] = true;
                    $result['data'] = $collectionObject;
                }
                echo json_encode($result);
            }
        }
    }

    public function getcollection(){
        header('Content-Type: application/json');
        $result = array();
        if(isset($_GET['id']) && strlen($_GET['id']) > 0){
            $idEncode = $_GET['id'];
            $collectionId = base64_decode($idEncode);
            $collectionObject = $this->collection_model->getCollectionById($collectionId);
            if($collectionObject != null){
                $result['status'] = true;
                $result['data'] = $collectionObject;
                echo json_encode($result);
            }
        }
    }
}
