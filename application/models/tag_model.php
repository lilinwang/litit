<?php
class tag_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
  
    function add_by_name($name) {
        // unique name constraint added in DB
        // so no more extra checking
        $sql = 'INSERT INTO tag(name) values(?)';
        $this->db->query($sql, array($name));
        return $this->get_id_by_name($name);
    }

    function get_id_by_name($name){
        $sql = 'SELECT tag_id FROM tag WHERE name=?';
        $query = $this->db->query($sql,array($name));
        if ($query->num_rows() > 0) {
            return $query->row()->tag_id;
        }
        else {
            return null;
        }
    }
}
