<?php
class musician_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	//登录
	function login($email,$password){//登录检查
		$sql="SELECT * FROM musician WHERE email=?";
		$query=$this->db->query($sql,array($email));
		$result1=$query->result_array();
		$query=$query->row();
		if($result1)//检查账户密码是否正确
		{
		$result2=($query->password==sha1($password));
		if($result2){return 1;}
		else{return 2;}//密码错误
		}
     	else{return 3;}//无此用户
	
	}

	function check_user($email){
		$sql="SELECT * FROM musician WHERE email=?";
		$query=$this->db->query($sql,array($email));
		return $query->result_array();
	}

	function create($email,$password,$nickname,$name,$gender,$birthday,$identity,$introduction,$attention,$portaitdir){
		$sql="INSERT INTO musician (email,password,nickname,name,gender,birthday,identity,introduction,attention,portaitdir) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$this->db->query($sql,array($email,$password,$nickname,$name,$gender,$birthday,$identity,$introduction,$attention,$portaitdir));
	}

	function drop($email,$password){
		$sql="DELETE FROM musician WHERE email=? AND password=?";
		$this->db->query($sql,array($email,$password));
	}

    function update($email,$password,$nickname,$name,$gender,$birthday,$identity,$introduction,$attention,$portaitdir){
		$sql="update musician SET nickname=?,name=?,gender=?,birthday=?,identity=?,introduction=?,attention=?,portaitdir=? WHERE email=? AND password=?";
		$this->db->query($sql,array($nickname,$name,$gender,$birthday,$identity,$introduction,$attention,$portaitdir));
	}

	function watch_by_email($email){
		$sql="SELECT * FROM musician WHERE email=?";
		$result=$this->db->query($sql,$email);
		return $result->result_array();
	}
	function getid_by_email($email)
	{
		$sql="SELECT musician_id FROM musician WHERE email=?";
		$query=$this->db->query($sql,$email);
		$result=$query->result_array();
		if($result){
			return $result[0];
		}else{
			return null;
		}
	}
    function check_id($id){
        $sql='select * from musician where musician_id=?';
        $query=$this->db->query($sql,$id);
		$result=$query->result_array();;
        return $result[0];
    }
}
?>