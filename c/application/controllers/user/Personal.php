<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('collection_model');
        if(!isset($_SESSION['user_id']) || $this->session->user_id <= 0 || !isset($_COOKIE['vnup_user'])){
            redirect(config_item('wp_home_url'));
        }
    }
	public function index(){
        $data['user_collections'] = $this->collection_model->getListCollectionBy(1, 30, $_SESSION['user_id']);
        $data['plus'] = config_item('plus');
        $data['multiple'] = config_item('multiple');

		$this->load->view('common/tpl_header');
        $this->load->view('user/tpl_personal', $data);
        $this->load->view('common/tpl_footer');
	}

    public function add_collection(){
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

    public function get_collection(){
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
