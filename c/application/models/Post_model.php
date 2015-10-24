<?php

class Post_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getAllPostFilterByTitle($title){
        $sql = "SELECT * FROM wp_posts as post LEFT JOIN wp_users user ON post.post_author = user.ID
                                                WHERE post.post_type='post' AND post.post_status='publish' AND post.post_title like ". $this->db->escape($title . "%") . " LIMIT 10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}