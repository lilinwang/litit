<?php
class music_tag_model extends CI_Model{
    function __construct()
    {
       parent::__construct();
    }

    function add($tag_id,$music_id){
        $sql="INSERT INTO music_tag(tag_id,music_id) VALUES(?, ?)";
        $this->db->query($sql,array($tag_id, $music_id));
    }

}
