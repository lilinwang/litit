<?php
class music_genre_model extends CI_Model{
    function __construct()
    {
       parent::__construct();
    }

    function add($genre_id,$music_id){
        $sql="INSERT INTO music_genre(genre_id,music_id) values(?, ?)";
        $this->db->query($sql,array($genre_id, $music_id));
    }
}
