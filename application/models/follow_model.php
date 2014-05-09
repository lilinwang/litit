<?php
class follow_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function add_follow($user_id, $musician_id){
		if ($this->is_follow($user_id, $musician_id)) {
		    return 1; // 表示已经操作了
		}
		
		$this->db->query(
		    "INSERT INTO follow (user_id, musician_id) VALUES (?, ?)",
		    array($user_id,$musician_id)
		);
		$this->db->trans_start();
		$this->db->query(
		    "UPDATE musician SET attention = attention+1 WHERE musician_id = ?",
		    array($musician_id)
		);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
		    return -1;
		}
		else {
			return 0; // 表示操作成功
		}
	}
	
	function delete_follow($user_id, $musician_id){
		if (!$this->is_follow($user_id, $musician_id)) {
		    return 1; // 表示已经操作了
		}
		
		$this->db->query(
		    "DELETE FROM follow WHERE user_id = ? AND musician_id = ?",
		    array($user_id,$musician_id)
		);
		$this->db->trans_start();
		$this->db->query(
		    "UPDATE musician SET attention = attention-1 WHERE musician_id = ?",
		    array($musician_id)
		);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
		    return -1;
		}
		else {
			return 0; // 表示操作成功
		}
	}
 
	function display($user_id){
		$sql="select musician.portaitdir,musician.nickname,musician.musician_id,musician.famousfor,music.name,music.dir from (follow left join musician on follow.musician_id=musician.musician_id) left join music on musician.famousfor=music.music_id where follow.user_id=?";
		$query=$this->db->query($sql,array($user_id));
		return $query->result_array();
	}
	
	function is_follow($user_id,$musician_id)
    {
  	  $sql='select count(follow_id) as count from follow where (user_id,musician_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$musician_id));
  	  $query=$query->row();
  	  return $query->count > 0;
    }
}
