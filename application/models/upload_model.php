<?php
class upload_model extends CI_Model{
    function __construct(){
        parent::__construct();
	}

    //增添喜欢曲目 
    function addupload($musician_id,$music_id){
        $sql="INSERT INTO upload (musician_id,music_id) VALUES(?,?)";
        $this->db->query($sql,array($musician_id,$music_id));
    }
 
    //列出用户喜欢歌曲名称列表  
    function display($musician_id){
        $sql="select music.music_id,music.name, music.dir ,music.image_dir,musician.nickname from (upload left join music on upload.music_id=music.music_id) left join musician on musician.musician_id=upload.musician_id where upload.musician_id=?";
        $query=$this->db->query($sql,array($musician_id));
        return $query->result_array();
    } 

}

