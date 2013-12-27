<?php
class collect_model extends CI_Model{
  function __construct(){
		parent::__construct();
	}
    
    function add_collect($user_id,$music_id){
    	if ($this->is_collect($user_id, $music_id)) {
    	    return 1; //表示已经操作过
    	}
    	
    	$this->db->trans_start();
    	$this->db->query(
    	    "INSERT INTO collect(user_id,music_id) VALUES(?,?)",
    	    array($user_id,$music_id)
    	);
    	$this->db->query(
    	    "UPDATE music SET collect_cnt = collect_cnt+1 WHERE music_id = ?", 
    	    array($music_id)
    	);
    	$this->db->trans_complete();
    	if ($this->db->trans_status() === FALSE) {
    	    return -1;
    	}
    	else {
    		return 0; // 表示操作成功
    	}
    }
    
    function delete_collect($user_id,$music_id){
    	if (!$this->is_collect($user_id, $music_id)) {
    	    return 1; //表示已经操作过
    	}
    	
    	$this->db->trans_start();
    	$this->db->query(
    	    "DELETE FROM collect WHERE user_id = ? AND music_id = ?",
    	    array($user_id,$music_id)
    	);
    	$this->db->query(
    	    "UPDATE music SET collect_cnt = collect_cnt-1 WHERE music_id = ?", 
    	    array($music_id)
    	);
    	$this->db->trans_complete();
    	if ($this->db->trans_status() === FALSE) {
    	    return -1;
    	}
    	else {
    		return 0; // 表示操作成功
    	}
    }
 
//列出用户喜欢歌曲名称列表  
  function display($user_id){
  $sql="select music.music_id,music.name, music.dir ,music.image_dir,musician.nickname from (collect left join music on collect.music_id=music.music_id) left join musician on musician.musician_id=music.musician_id where collect.user_id=?";
  $query=$this->db->query($sql,array($user_id));
  return $query->result_array();
  }
  function is_collect($user_id,$music_id)
  {
  	  $sql='select count(collect_id) as count from collect where (user_id,music_id)=(?,?)';
  	  $query=$this->db->query($sql,array($user_id,$music_id));
  	  $query=$query->row();
  	  return $query->count > 0;
  }

    function get_collection_by_user_id($user_id) {
        $query = $this->db->query(
            'SELECT music_id FROM collect WHERE user_id = ?',
            array($user_id)
        );
        return $query->result_array();
    }

}

