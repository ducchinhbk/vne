<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Cauth controller.
	 *
	 */
    function __construct()
    {
        
        parent::__construct();
        //$this->load->library('Input');
        if (!$this->input->is_ajax_request()) {
           exit('No direct script access allowed');
        }
    }
    
    
	public function index()
	{  
	   echo "fdadfldahf";
	}
    
    public function c_get_post_categories()
    {   
        $this->load->model('post');
        
        $cate_id = $this->input->post('cate_id');
        if(empty($cate_id))
        {
            $cate_id = '0';
        }
        
        
        $categories = $this->post->get_post_sub_categories($cate_id);
        $data['categories'] = $categories;
        
       
		
        $this->load->view('ajax/tpl_subcategory', $data);
        
    }
    
   
}
