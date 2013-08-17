<?php
class collectm_model extends CI_Model{
  function __construct(){
		parent::__construct();
	}
//增添喜欢曲目 
function addcollect($user_id,$music_id){
	$sql="INSERT INTO collectm(user_id,music_id) VALUES(?,?)";
	$this->db->query($sql,array($user_id,$music_id));
	$this->db->query("UPDATE music SET collect_cnt = collect_cnt+1 WHERE music_id = $music_id");
}
 
//列出用户喜欢歌曲名称列表  
  function display($user_id){
  $sql="select music.music_id,music.name, music.dir ,music.image_dir,musician.nickname from (collectm left join music on collectm.music_id=music.music_id) left join musician on musician.musician_id=music.musician_id where collectm.user_id=?";
  $query=$this->db->query($sql,array($user_id));
  return $query->result_array();
  }
  function is_collect($user_id,$music_id)
  {
  	  $sql='select count(collect_id) as count from collectm where (user_id,music_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$music_id));
  	  $query=$query->row();
  	  return $query->count;
  }
}


?>