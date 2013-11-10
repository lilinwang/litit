<?php
class music_musician_model extends CI_Model{
    function __construct(){
        parent::__construct();
	}

    function add($musician_id, $music_id){
        $sql = "INSERT INTO music_musician (musician_id,music_id) VALUES(?,?)";
        $this->db->query($sql, array($musician_id,$music_id));
    }

    function remove($musican_id, $music_id) {
        $sql = 'DELETE FROM music_musician WHERE musician_id = ? AND music_id = ?';
        $this->db->query($sql, array($musician_id, $music_id));
    }
}

