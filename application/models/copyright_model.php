<?php
class copyright_model extends CI_Model{
    function __construct(){
       parent::__construct();
    
    }
    //插入新数据
    function insert_new_copyright($musician_id,$user_id,$music_id,$name,$company,$identity,$phone,$email,$content,$user_image,$music_name)
    {
    	$sql='INSERT INTO copyright (musician_id,user_id,music_id,name,company,identity,phone,email,content,user_image,music_name) values (?,?,?,?,?,?,?,?,?,?,?)';
	     $this->db->query($sql,array($musician_id,$user_id,$music_id,$name,$company,$identity,$phone,$email,$content,$user_image,$music_name));
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
    function get_all_by_id($copyright_id)
    {
    	$sql='SELECT * FROM copyright WHERE copyright_id=?';
		$result=$this->db->query($sql,$copyright_id);
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
  function display($user_id)
  {
  	  $sql='select * from copyright where user_id=?';
  	  $query=$this->db->query($sql,array($user_id));
      return $query->result_array();
  }
  function update_by_id($map,$id)
  {//更改某些项
		/*例如：
			$map['user_image']='path';
			$map['misic_name']='hello';
			$this->user_model->update_by_id($map,$id);
		 * *
		 */
		foreach($map as $key=>$var){
	    	$sql="UPDATE copyright SET ".$key."=? WHERE copyright_id=?";
			$result=$this->db->query($sql,array($var,$id));

		}
	}
}
?>