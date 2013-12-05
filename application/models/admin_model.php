<?php
class admin_model extends CI_Model{

    function __construct(){
       parent::__construct();
    
    }
//查询admin元组是否存在
  function check($email){
   $sql="SELECT * FROM admin WHERE email=?";
   $query=$this->db->query($sql,array($email));
   return $query->result_array();
  }
  //登录
  function login($email,$password){
   $sql="SELECT * FROM admin WHERE email=? AND password=?";
   $query=$this->db->query($sql,array($email,$password));
   $result=$query->result_array();
   if($result){
     return $result[0];
     }
     else{return null;}
     }
  
}
?>