<?php
class follow_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
//增添喜欢曲目 
	function addfollow($user_id,$musician_id){
		$sql="INSERT INTO follow(user_id,musician_id) VALUES(?,?)";
		$this->db->query($sql,array($user_id,$musician_id));
		$this->db->query("UPDATE musician SET attention = attention+1 WHERE musician_id = $musician_id");
	}
 
//列出用户喜欢歌曲名称列表  
	function display($user_id){
		$sql="select musician.portaitdir,musician.nickname,musician.musician_id from musician,follow where musician.musician_id=follow.musician_id AND follow.user_id=?";
		$query=$this->db->query($sql,array($user_id));
		return $query->result_array();
	}
}


?>