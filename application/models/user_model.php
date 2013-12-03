<?php
class user_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	//查询用户是否存在和获取用户所有信息
	function check($email){
		$sql="SELECT * FROM user WHERE email=?";
		$query=$this->db->query($sql,array($email));
		return $query->result_array();
	}
	//查询用户是否存在相片
	function check_photo($id){
		$sql="SELECT port_dir FROM user WHERE user_id=?";
		$query=$this->db->query($sql,array($id));
  	    $query=$query->row();
  	    return $query->port_dir;
	}
	//通过id获取用户所有信息
	function get_from_id($id){
		$sql="SELECT * FROM user WHERE user_id=?";
		$query=$this->db->query($sql,array($id));
		$result=$query->result_array();
        return $result[0];
	}
	
	//登录
	function login($email,$password){//登录检查
		$sql="SELECT * FROM user WHERE email=?";
		$query=$this->db->query($sql,array($email));
		$result1=$query->result_array();
		$query=$query->row();
		if($result1)//检查账户密码是否正确
		{
		$result2=($query->password==sha1($password.$query->reg_time));
		if($result2){return 1;}//用户名与密码匹配
		else{return 2;}//密码错误
		}
     	else{return 3;}//无此用户
	
	}
	
	//注册
	function register_all($email,$password,$name,$nickname,$gender,$birthday){//全部项
		$sql="INSERT INTO user (email,password,name,nickname,gender,birthday) VALUES (?,?,?,?,?,?)";
		$this->db->query($sql,array($email,$password,$name,$nickname,$gender,$birthday));	
	}
	function register_simple($email,$password){//必填项
		$sql="INSERT INTO user (email,sha1（password）) VALUES (?,?)";
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
	function update_by_id($map,$id){//更改某些项
		/*例如：
			$map['gender']='1';
			$map['name']='hello';
			$this->user_model->update_by_id($map,$id);
		 * *
		 */
		foreach($map as $key=>$var){
	    	$sql="UPDATE user SET ".$key."=? WHERE user_id=?";
			$result=$this->db->query($sql,array($var,$id));
		}
	}

	function update_by_all($email,$password,$name,$nickname,$gender,$birthday,$introdution){//更改全部项email除外
			$sql="UPDATE user SET password=?,name=?,nickname=?,gender=?,birthday=?,introduction=?  WHERE email=?";
			$result=$this->db->query($sql,array($password,$name,$nickname,$gender,$birthday,$introdution,$email));
	}

	
	//注销用户
	function cancel_by_email($email){
		$sql="DELETE FROM user WHERE email=?";
		$this->db->query($sql,array($email));
	}
	//查询星座
	 function check_constellation($date)
    {
    	$day=$date[5]*1000+$date[6]*100+$date[8]*10+$date[9];
    	if(($day>=321)&&($day<=419)) $constellation="白羊座";
    	elseif($day>=420&&$day<=520) $constellation="金牛座";
    	elseif($day>=521&&$day<=621) $constellation="双子座";
    	elseif($day>=622&&$day<=722) $constellation="巨蟹座";
    	elseif($day>=723&&$day<=822) $constellation="狮子座";
    	elseif($day>=823&&$day<=922) $constellation="处女座";
    	elseif($day>=923&&$day<=1023) $constellation="天秤座";
    	elseif($day>=1024&&$day<=1122) $constellation="天蝎座";
    	elseif($day>=1123&&$day<=1221) $constellation="射手座";
    	elseif($day>=120&&$day<=218) $constellation="水瓶座";
    	elseif($day>=219&&$day<=320) $constellation="双鱼座";
    	else $constellation="摩羯座";    	
        return $constellation;
    }
    
    // 获取一行中可以暴露的信息（所以不包括密码，注册时间(用来加密密码)）
    function get_exposable_row($id) {
    	$sql = "SELECT * FROM user WHERE user_id=? LIMIT 1";
    	$query = $this->db->query($sql,array($id));
    	$result = $query->row_array();
    	
    	// unset user password, user reg_time
    	unset($result['password']);
    	unset($result['reg_time']);
    	
        return $result;
    }
}