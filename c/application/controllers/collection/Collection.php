<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('collection_model');
        $this->load->model('user_model');

        // TODO : check previlige to view this collection
    }
    public function index(){
        // CHECK COOKIE FOR LOGIN
        
        $data['collectionList'] = '';
       
        $this->load->view('common/tpl_header');
        $this->load->view('collection/tpl_collection', $data);
        $this->load->view('common/tpl_footer');
    }

    public function addposttocolleciton(){
        header('Content-Type: application/json');
        if (isset($_SESSION['user_id']) && $this->session->user_id > 0 && isset($_COOKIE['vnup_user'])) {
            if(isset($_POST['user_collection_id']) && isset($_POST['post_id']) && isset($_POST['post_author_id'])){
                $this->collection_model->insertCollectionData($_POST);
                $result['status'] = true;
                echo json_encode($result);
            }
        }
        echo '';
    }


}
