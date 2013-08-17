<?php
class followm_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
//增添喜欢曲目 
	function addfollow($user_id,$musician_id){
		$sql="INSERT INTO followm(user_id,musician_id) VALUES(?,?)";
		$this->db->query($sql,array($user_id,$musician_id));
		$this->db->query("UPDATE musician SET attention = attention+1 WHERE musician_id = $musician_id");
	}
 
//列出用户喜欢歌曲名称列表  
	function display($user_id){
		$sql="select musician.portaitdir,musician.nickname,musician.musician_id,musician.famousfor,music.name,music.dir from (followm left join musician on followm.musician_id=musician.musician_id) left join music on musician.famousfor=music.music_id where followm.user_id=?";
		$query=$this->db->query($sql,array($user_id));
		return $query->result_array();
	}
	function is_follow($user_id,$musician_id)
  {
  	  $sql='select count(follow_id) as count from followm where (user_id,musician_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$musician_id));
  	  $query=$query->row();
  	  return $query->count;
  }
}


?>