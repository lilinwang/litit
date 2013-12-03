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
		$result2=($query->password==sha1($password.$query->reg_time));
		if($result2){return 1;}
		else{return 2;}//密码错误
		}
     	else{return 3;}//无此用户
	
	}
	//查询用户是否存在相片
	function check_photo($id){
		$sql="SELECT portaitdir FROM musician WHERE musician_id=?";
		$query=$this->db->query($sql,array($id));
  	    $query=$query->row();
  	    return $query->portaitdir == "";
	}
	function check_user($email){
		$sql="SELECT * FROM musician WHERE email=?";
		$query=$this->db->query($sql,array($email));
		return $query->result_array();
	}
		//通过id获取音乐人所有信息
	function get_from_id($id){
		$sql="SELECT * FROM musician WHERE musician_id=?";
		$query=$this->db->query($sql,array($id));
		$result=$query->result_array();
        return $result[0];
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
   	function update_by_id($map,$id){//更改某些项
		/*例如：
			$map['gender']='1';
			$map['name']='hello';
			$this->user_model->update_by_id($map,$id);
		 * *
		 */
		foreach($map as $key=>$var){
	    	$sql="UPDATE musician SET ".$key."=? WHERE musician_id=?";
			$result=$this->db->query($sql,array($var,$id));
		}
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
		$result=$query->result_array();
        return $result[0];
    }
    function musician_attention_top_10(){
        $sql = 'select * from musician order by attention DESC limit 10';
        $query = $this->db->query($sql);
		$result=$query->result_array();
        return $result;
    }
    function attention_inc($id1,$id2,$id3,$id4){
       $this->db->query('update musician set attention=attention+1 where musician_id=?',$id1);
       	$sql="SELECT attention FROM musician WHERE musician_id=?";
		$query=$this->db->query($sql,$id1);
		if ($id4==1)$this->db->query('insert into follow (musician_id,user_id) values (?,?)',array($id1,$id3));
		else $this->db->query('insert into followm (musician_id,user_id) values (?,?)',array($id1,$id3));
		$query=$query->row();	
    	return $query->attention;
    }
    function attention_dec($id1,$id2,$id3,$id4){
       $this->db->query('update musician set attention=attention-1 where musician_id=?',$id1);
       	$sql="SELECT attention FROM musician WHERE musician_id=?";
		$query=$this->db->query($sql,$id1);
		if ($id4==1)$this->db->query('delete from follow where (musician_id,user_id)=(?,?) ',array($id1,$id3));
		else $this->db->query('delete from followm where (musician_id,user_id)=(?,?) ',array($id1,$id3));
		$query=$query->row();	
    	return $query->attention;
    }
    //查询星座
    function check_constellation($date)
    {
    $day=$date[5]*1000+$date[6]*100+$date[8]*10+$date[9];
    	if($day>=321&&$day<=419) $constellation="白羊座";
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

    function update_avatar($musician_id, $url) {
        $sql = 'update musician set portaitdir = ? where musician_id = ?';
        $this->db->query($sql, array($url, $musician_id));
    }
    
    // 获取一行中可以暴露的信息（所以不包括密码，注册时间(用来加密密码)）
    function get_exposable_row($id) {
    	$sql = "SELECT * FROM musician WHERE musician_id=? LIMIT 1";
    	$query = $this->db->query($sql,array($id));
    	$result = $query->row_array();
    	
    	// unset user password, user reg_time
    	unset($result['password']);
    	unset($result['reg_time']);
    	
        return $result;
    }
}
