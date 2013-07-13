<?php
class music_tag_model extends CI_Model{
   function __construct()
    {
       parent::__construct;
    }
//为music增加tag
  function addtag($tag_id,$music_id){
  $sql="SELECT tag_id,music_id FROM music_tag WHERE tag_id=? AND music_id =?";
  $this->db->query($sql,array($tag_id.$music_id));
  }

}
?>