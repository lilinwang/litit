<?php
class privateletter_model extends CI_Model{
    function __construct(){
       parent::__construct();
    
    }
    //插入新数据
    function insert_new_letter($musician_id,$user_id,$content,$user_image,$musician_image)
    {
    	$sql='INSERT INTO private_letter (musician_id,user_id,letter,user_image,musician_image) values (?,?,?,?,?,?)';
	     $this->db->query($sql,array($musician_id,$user_id,$content,$user_image,$musician_image));
    }
    function get_all_by_musician_id($musician_id)
    {
    	$sql='SELECT * FROM private_letter WHERE musician_id=?';
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
    	$sql='SELECT * FROM private_letter WHERE user_id=?';
		$result=$this->db->query($sql,$user_id);
		$result=$result->result_array();
		if($result){
			return $result[0];
		}else{
			return;
		}
    }

     function get_all_by_id($letter_id)
    {
    	$sql='SELECT * FROM private_letter WHERE letter_id=?';
		$result=$this->db->query($sql,$letter_id);
		$result=$result->result_array();
		if($result){
			return $result[0];
		}else{
			return;
		}
    }
    //删除数据
    function drop_letter($user_id,$musician_id)
    {
    	$sql='DELETE FROM private_letter WHERE user_id=? AND musician_id=?';
		$this->db->query($sql,array($user_id,$musician_id));
    }
    function is_lettter_sign($user_id,$musician_id)
  {
  	  $sql='select count(user_id) as count from private_letter where (user_id,musician_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$musician_id));
  	  $query=$query->row();
  	  return $query->count;
  }
  function display($user_id)
  {
  	  $sql='select * from private_letter where user_id=?';
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
	    	$sql="UPDATE private_letter SET ".$key."=? WHERE letter_id=?";
			$result=$this->db->query($sql,array($var,$id));
		}
	}
	 function update_by_messageid($map,$user_id,$musician_id)
  {//更改某些项
		/*例如：
			$map['user_image']='path';
			$map['misic_name']='hello';
			$this->user_model->update_by_id($map,$id);
		 * *
		 */
		foreach($map as $key=>$var){
	    	$sql="UPDATE private_letter SET ".$key."=? WHERE (user_id,musician_id)=(?,?)";
			$result=$this->db->query($sql,array($var,$user_id,$musician_id));

		}
	}
}
?>