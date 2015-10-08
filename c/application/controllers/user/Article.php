<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	private $error = array();
     
    function __construct()
    {
        parent::__construct();
    }
    
    
	public function create()
	{  
	   $this->load->helper('wp');
       
        if( $this->input->post('post_data') && $this->validateForm()){
            echo "run herre";
            
             $post_data = $this->input->post('post_data');
             $filename = $_FILES["thumb"]["name"];
             $tmp_file = $_FILES["thumb"]["tmp_name"];
             //echo 'filename = '.$filename;
             //echo 'tmp_name = '.$tmp_name;
             //var_dump($post_data); 
            // exit;
             
             if(isset($post_data['subcate_id']))
             {
                $sub_cate = $post_data['subcate_id'];
             }
             else{
                $sub_cate = '';
             }
             //insert post by reusing wordpress function
             $new_post = array(
            	'post_author' => 1, //set user id by session
            	'post_status' => 'draft',
            	'comment_status' => 'open',
                'post_title'    => $post_data['title'],
                'post_content'  => $post_data['content'],
                'post_category' => array($post_data['category_id'],$sub_cate)
            );
            
            $post_id = c_insert_post($new_post);
             
            if($post_id != 0 )
            {
                echo "run in post thumbnail";
                c_set_post_thumbnail($post_id, $filename, $tmp_file);
                echo " Insert post's successfull";
                exit;
            }
       }
        
        $this->getForm();
	}
    
    protected function getForm(){
        
        //$this->load->helper('url');
        $this->load->helper('wp');
        $this->load->helper('form');
        $this->load->model('post');
        
        $categories = $this->post->get_post_sub_categories('0');
        
        $data['categories'] = $categories;
        $data['ajax_link'] = base_url('ajax/c_get_post_categories');
       
        if (!empty($this->error['category_id'])) {
			$data['error_catgory'] = $this->error['category_id'];
		} else {
			$data['error_catgory'] = '';
		}

		if (!empty($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = '';
		}

		if (!empty($this->error['content'])) {
			$data['error_content'] = $this->error['content'];
		} else {
			$data['error_content'] = '';
		}
        
        if (isset($this->error['thumb'])) {
			$data['error_thumb'] = $this->error['thumb'];
		} else {
			$data['error_thumb'] = '';
		}
       
       //catch submit data
        if( $this->input->post('post_data') ){
            
            $post_data = $this->input->post('post_data');
           
            
        }
            
        if(isset($post_data['category_id']))
        { 
            $data['category_id'] = $post_data['category_id'];
            $sub_categoroies = $this->post->get_post_sub_categories($data['category_id']);
            $data['sub_categoroies'] = $sub_categoroies;
        }
        else{
            $data['category_id'] = "";
        }
            
        if(isset($post_data['subcate_id']))
        {
            $data['subcate_id'] = $post_data['subcate_id'];
        }
        else{
            $data['subcate_id'] = "";
        }
            
        if(isset($post_data['title']))
        {
            $data['title'] = $post_data['title'];
        }
        else{       
            $data['title'] = "";
        }
            
        if(isset($post_data['content']))
        {
            $data['content'] = $post_data['content'];
        }
        else{ 
            $data['content'] = "";
        }
        
        if( isset($_POST['thumb'] ) )
        {
            $data['thumb'] = $_POST['thumb'];
        }
        else{
            $data['thumb']  = "";
        }    
        
       
		$data['header_view'] = c_get_header();
        $this->load->view('user/tpl_createpost', $data);
        $this->load->view('common/tpl_footer');
        
    }
    
    protected function validateForm() {
        
        $value = $this->input->post('post_data');
        //var_dump($value);
        $filename =  $_FILES["thumb"]["name"];
        
        if ((mb_strlen($value['title'], 'UTF-8') < 3) || (mb_strlen($value['title'], 'UTF-8') > 255)) {
	       $this->error['title'] = "Tiêu đề bài viết phải quá ngắn hoặc quá dài";
	    }

        if ( empty($value['category_id']) ) {
            $this->error['category_id'] = "Bạn chưa chọn danh mục";    
        } 
            
        if ((mb_strlen($value['content'], 'UTF-8') < 50 ) ) {
            $this->error['content'] = "Nội dung bài viết quá ngắn";
               
        } 
		    
        if ( empty($filename) ) {
            $this->error['thumb'] = "Bạn chưa upload ảnh đại diện";
        } 
        else {
            define('MB', 1048576); //define 1MB file size
            $file_size = $_FILES["thumb"]["size"];
               
            $exts = array('png', 'jpg'); 
            if(!in_array(pathinfo($filename, PATHINFO_EXTENSION), $exts)){
                $this->error['thumb'] = "Ảnh đại diện chưa đúng định dạng(jpg, png)";
            }
            else if( $file_size > MB){
                $this->error['thumb'] = "Kích thước ảnh không được quá 1MB";
            }
        }  
        
        return !$this->error;
    }
   
}
