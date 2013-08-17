<?php
class music_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_by_id($id){                        //通过id获取音乐所有信息
		$sql='SELECT * FROM music WHERE music_id=?';
		$result=$this->db->query($sql,$id);
		$result=$result->result_array();
		if($result){
			return $result[0];
		}else{
			return;
		}
	}
	function check_music($musician_id,$name){                //检查同一音乐人下的歌曲名是否有趣冲突
	    $sql='SELECT * FROM music WHERE musician_id=? AND name=?';
	    $query=$this->db->query($sql,array($musician_id,$name));
		return $query->result_array();
	}
	function insert_new_music($name,$story,$musician_id){    //上传成功后更新数据库
	     $sql='INSERT INTO music(name,musician_id,story,download_cnt,share_cnt,like_cnt,view_cnt,randable) values (?,?,?,?,?,?,?,?)';
	     $this->db->query($sql,array($name,$musician_id,$story,0,0,0,0,0));
	     $music_id_query=$this->getid($musician_id,$name);
	     $music_id=$music_id_query['music_id'];
	     $sql='update music SET dir=? WHERE musician_id=? AND name=?';
	     $dir='upload/music/user_'.$musician_id.'/music_'.$music_id.'.mp3';
		 $this->db->query($sql,array($dir,$musician_id,$name));
		 return $music_id;
	}
	function add_download_count($musician_id,$name){        //当被下载时，下载次数加1
	    $sql='update music SET download_cnt=download_cnt+1 WHERE musician_id=? AND name=? ';
	    $this->db->query($sql,array($musician_id,$name));
	}
	function drop_music($musician_id,$name){                //删除歌曲
		$sql='DELETE FROM music WHERE musician_id=? AND name=?';
		$this->db->query($sql,array($musician_id,$name));
	}
	function drop_music_by_id($music_id){                //删除歌曲
		$sql='DELETE FROM music WHERE music_id=?';
		$this->db->query($sql,array($music_id));
	}
	function getid($musician_id,$name)
	{
		$sql='SELECT music_id FROM music WHERE musician_id=? AND name=?';
		$query=$this->db->query($sql,array($musician_id,$name));
		$result=$query->result_array();
		if($result){
				return $result[0];
		}else{
			return;
		}
	}
	function getimg($musician_id,$name)
	{
		$musci_id=$this->getid($musician_id,$name);
		$dir='upload/image/user_'.$musician_id.'/image_'.musci_id.'jpg';
		if(file_exists($dir))
			return $dir;
		else
			return 'upload/image/default.jpg';
	}
	function getimg_by_id($music_id)
	{
		$sql='SELECT dir FROM music WHERE music_id=?';
		$query=$this->db->query($sql,array($music_id));
		$result=$query->result_array();
		if($result){
			$music_dir=$result[0];
			$img_dir=str_replace('music', 'image', $music_dir);
			if(file_exists($img_dir))
				return $img_dir;
			else
				return 'upload/image/default.jpg';
		}else{
			return;
		}
	}
    function rand(){
        $sql = 'select * from music order by rand()  limit 1';
        $query = $this->db->query($sql);
		$result=$query->result_array();
        return $result[0];
    }
    
	
	function rand_by_musician($musician_id){
        $sql = 'select * from music where musician_id=? order by rand()  limit 1';
        $query = $this->db->query($sql,$musician_id);
		$result=$query->result_array();
        return $result[0];
    }
    function music_download_top_10(){
        $sql = 'select * from music order by download_cnt DESC limit 10';
        $query = $this->db->query($sql);
		$result=$query->result_array();
        return $result;
    }
    function music_share_top_10(){
        $sql = 'select * from music order by share_cnt DESC limit 10';
        $query = $this->db->query($sql);
		$result=$query->result_array();
        return $result;
    }
    function music_collect_top_10(){
        $sql = 'select * from music order by collect_cnt DESC limit 10';
        $query = $this->db->query($sql);
		$result=$query->result_array();
        return $result;
    }
	//add
	function getallmusic_by_musician_id($musician_id){
        $sql='select musician_id,music_id,album_dir,dir,name,story from music where musician_id=?';
        $query=$this->db->query($sql,$musician_id);
		$result=$query->result_array();
        return $result;
    }
	//modified by wll
	function gettag_by_id($music_id)
	{
		$sql='SELECT name FROM tag WHERE tag_id IN (SELECT tag_id FROM music_tag WHERE music_id=?)';
		$query=$this->db->query($sql,$music_id);
		$result=$query->result_array();
		$re=array();
		foreach ($result as $key) {$re[]=$key['name'];};
		return $re;
	}
	function collect_inc($id1,$id2,$id3,$id4){
        $this->db->query('update music set collect_cnt=collect_cnt+1 where music_id=?',$id2);
        if ($id4==1) $this->db->query('insert into collect (music_id,user_id) values (?,?)',array($id2,$id3));
		else $this->db->query('insert into collectm (music_id,user_id) values (?,?)',array($id2,$id3));
		return;	
    }
   	function collect_dec($id1,$id2,$id3,$id4){
        $this->db->query('update music set collect_cnt=collect_cnt-1 where music_id=?',$id2);
        if ($id4==1) $this->db->query('delete from collect where (music_id,user_id)=(?,?)',array($id2,$id3));
		else $this->db->query('delete from collectm where (music_id,user_id)=(?,?)',array($id2,$id3));
		return;	
    }
	
}
?>