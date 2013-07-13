<?php
class user_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	//查询用户是否存在
	function check($email){
		$sql="SELECT * FROM user WHERE email=?";
		$query=$this->db->query($sql,array($email));
		return $query->result_array();
	}
	
	//登录
	function login($email,$password){//登录检查和获取用户所有信息
		$sql="SELECT * FROM user WHERE email=? and password=? ";
		$query=$this->db->query($sql,array($email,$password));
		$result=$query->result_array();
		if($result){
			return $result[0];
		}else{
			return null;
		}
	}
	
	//注册
	function register_all($email,$password,$name,$nickname,$gender,$birthday){//全部项
		$sql="INSERT INTO user (email,password,name,nickname,gender,birthday) VALUES (?,?,?,?,?,?)";
		$this->db->query($sql,array($email,$password,$name,$nickname,$gender,$birthday));	
	}
	function register_simple($email,$password){//必填项
		$sql="INSERT INTO user (email,password) VALUES (?,?)";
		$this->db->query($sql,array($email,$password));	
	}
	
	
	//更新
	function update_by_email($map,$email){//更改某些项
		/*例如：
			$map['gender']='1';
			$map['name']='hello';
			$this->user_model->update_by_email($map,$email);
		 * *
		 */
		foreach($map as $key=>$var){
	    	$sql="UPDATE user SET ".$key."=? WHERE email=?";
			$result=$this->db->query($sql,array($var,$email));
		}
	}
	
	function update_by_all($email,$password,$name,$nickname,$gender,$birthday){//更改全部项email除外
			$sql="UPDATE user SET password=?,name=?,nickname=?,gender=?,birthday=?  WHERE email=?";
			$result=$this->db->query($sql,array($password,$name,$nickname,$gender,$birthday,$email));
	}
	
	//注销用户
	function cancel_by_email($email){
		$sql="DELETE FROM user WHERE email=?";
		$this->db->query($sql,array($email));
	}

	
}
?>