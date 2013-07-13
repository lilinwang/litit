<?php
class tag_model extends CI_Model{

  function __construct(){
     parent::__construct();
  }
  
  //查询tag是否存在
function checktag($name){
   $sql="SELECT * FROM tag WHERE tag = ?";
   $query=$this->db->query($sql,array($name));
   return $query=$this->result_array();}
   
   //增加新的tag
   function addnewtag($name){
   $sql="SELECT name FROM tag WHERE name=?";
   $this->db->query($sql,array($name)); 
   }
   //通过name查找id
   function findid($name)
   {
    $sql="SELECT id FROM tag WHERE name=?";
    $query=$this->db->query($sql,array($name));
    return $query->result_array();
   }
}
?>