<?php
class collect_model extends CI_Model{
  function __construct(){
		parent::__construct();
	}
//增添喜欢曲目 
function addcollect($user_id,$music_id){
	$sql="INSERT INTO collect(user_id,music_id) VALUES(?,?)";
	$this->db->query($sql,array($user_id,$music_id));
	$this->db->query("UPDATE music SET collect_cnt = collect_cnt+1 WHERE music_id = $music_id");
}
 
//列出用户喜欢歌曲名称列表  
  function display($user_id){
  $sql="select music.name, music.dir ,music.image_dir,musician.nickname from music,collect,musician where collect.music_id=music.music_id AND musician.musician_id=music.musician_id AND collect.user_id=?";
  $query=$this->db->query($sql,array($user_id));
  return $query->result_array();
  }
  function is_collect($user_id,$music_id)
  {
  	  $sql='select count(collect_id) as count from collect where (user_id,music_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$music_id));
  	  $query=$query->row();
  	  return $query->count;
  }
}


?>