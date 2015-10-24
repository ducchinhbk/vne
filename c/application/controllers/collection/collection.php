<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('collection_model');

        // TODO : check previlige to view this collection
    }
    public function index(){
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestURI = str_replace('.html', '', $requestURI);
        $lastUnderScore = strrpos($requestURI, "_");
        $encodeId = substr($requestURI, $lastUnderScore + 1);
        $data['collectionList'] = array();
        if(is_numeric($encodeId)){
            $collectionId = (int)$encodeId/config_item('multiple') - config_item('plus');
            $data['collectionList'] = $this->collection_model->fetchAllPostCollection($collectionId);
        }
        $this->load->view('common/tpl_header');
        $this->load->view('collection/tpl_collection', $data);
        $this->load->view('common/tpl_footer');
    }


}
