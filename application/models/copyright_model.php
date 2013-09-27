<?php
class copyright_model extends CI_Model{
    function __construct(){
       parent::__construct();
    
    }
    //插入新数据
    function insert_new_copyright($musician_id,$user_id,$music_id,$name,$company,$identity,$phone,$email,$content)
    {
    	$sql='INSERT INTO copyright (musician_id,user_id,music_id,name,company,identity,phone,email,content) values (?,?,?,?,?,?,?,?,?)';
	     $this->db->query($sql,array($musician_id,$user_id,$music_id,$name,$company,$identity,$phone,$email,$content));
    }
    function get_all_by_musician_id($musician_id)
    {
    	$sql='SELECT * FROM copyright WHERE musician_id=?';
		$result=$this->db->query($sql,$musician_id);
		$result=$result->result_array();
		if($result){
			return $result[0];
		}else{
			return;
		}
    }
    function get_all_by_user_id($user_id)
    {
    	$sql='SELECT * FROM copyright WHERE user_id=?';
		$result=$this->db->query($sql,$user_id);
		$result=$result->result_array();
		if($result){
			return $result[0];
		}else{
			return;
		}
    }
    //删除数据
    function drop_copyright($user_id,$music_id)
    {
    	$sql='DELETE FROM copyright WHERE user_id=? AND music_id=?';
		$this->db->query($sql,array($user_id,$music_id));
    }
    function is_copyright_sign($user_id,$music_id)
  {
  	  $sql='select count(user_id) as count from copyright where (user_id,music_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$music_id));
  	  $query=$query->row();
  	  return $query->count;
  }
  function display($musician_id)
  {
  	  $sql='select * from copyright where musician_id=?';
  	  $query=$this->db->query($sql,array($musician_id));
      return $query->result_array();
  }
}
?>