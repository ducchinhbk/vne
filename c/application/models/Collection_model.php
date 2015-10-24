<?php

class Collection_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getListCollectionBy($page, $limit, $user_id){
        $start = ($page-1)*$limit;
        $end = $start + $limit;
        $sql = "SELECT * FROM wp_user_collection WHERE user_id = ". (int) $user_id . " ORDER BY date ASC ". "LIMIT ". $start .",". $end;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getCollectionById($collection_id){
        if(is_numeric($collection_id)){
            $sql = "SELECT * FROM wp_user_collection WHERE user_collection_id = ". (int)$collection_id;
            $query = $this->db->query($sql);
            if($query->num_rows() == 1){
                return $query->result_array()[0];
            }
        }
        return null;
    }

    /**
     * @param $data
     * @return Only Return 1 obejct
     *
     */
    public function getCollectionByDataFilter($data){
        if(isset($data['user_id']) && $data['user_id'] > 0 && isset($data['title'])){
            $sql = "SELECT * FROM wp_user_collection WHERE user_id = ". (int) $data['user_id'] . " AND
                                                           collection_title = ". $this->db->escape($data['title']);
            $query = $this->db->query($sql);
            if($query->num_rows() == 1){
                return $query->result_array()[0];
            }else{
                return null;
            }
        }
    }

    public function insert($data){
        if(isset($data['user_id']) && $data['user_id'] > 0){
            $sql = "INSERT INTO wp_user_collection SET
                        user_id = ". (int)$data['user_id'] .",
                        collection_title = ". $this->db->escape($data['title']) .",
                        collection_description = ". $this->db->escape($data['description']) .",
                        shared = ". $data['shared'] .",
                        date = '". date('Y-m-d h:i:s'). "'";
            $this->db->query($sql);
            $data['user_collection_id'] = $this->db->insert_id();
            unset($data['user_id']);
            return $data;
        }
        return null;
    }

    public function update($data){
        if(isset($data['user_id']) && $data['user_id'] > 0){
            $sqlUpdate = '';
            if(isset($data['title'])){
                $sqlUpdate .= (empty($sqlUpdate))? 'collection_title = '. $this->db->escape($data['title'])
                                                : ',collection_title = '. $this->db->escape($data['title']);
            }
            if(isset($data['description'])){
                $sqlUpdate .= (empty($sqlUpdate))? 'collection_description = '. $this->db->escape($data['description'])
                                                : ',collection_description = '. $this->db->escape($data['description']);
            }
            if(isset($data['shared'])){
                $sqlUpdate .= (empty($sqlUpdate))? 'shared = '. $data['shared']
                                                : ',shared = '. $data['shared'];
            }
            if(!empty($sqlUpdate)){
                $sql = "UPDATE wp_user_collection SET ". $sqlUpdate ." WHERE user_id = ". (int)$data['user_id'];
                $this->db->query($sql);
                return true;
            }
        }
        return false;
    }

    public function fetchAllPostCollection($collectionId){
        $sql = "SELECT * FROM wp_user_collection_data as ucd
                         LEFT JOIN wp_posts as post ON ucd.post_id = post.ID
                         LEFT JOIN wp_postmeta as postmeta ON post.ID = postmeta.post_id
                         WHERE ucd.user_collection_id = ". (int)($collectionId);
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}