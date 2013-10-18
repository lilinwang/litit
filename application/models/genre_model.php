<?php
class genre_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
  
    function add_by_name($name){
        // unique name constraint added in DB
        // so no more extra checking
        $sql = 'INSERT INTO genre(name) values(?)';
        $this->db->query($sql, array($name));
        return $this->get_id_by_name($name);
    }

    function get_id_by_name($name){
        $sql="SELECT genre_id FROM genre WHERE name=?";
        $query=$this->db->query($sql,array($name));
        if ($query->num_rows() > 0) {
            return $query->row()->genre_id;
        }
        else {
            return null;
        }
    }
}
