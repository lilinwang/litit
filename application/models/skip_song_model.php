<?php
class skip_song_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function addRecord($user_id, $music_id){
		$sql="INSERT INTO skip_song(user_id,music_id) VALUES(?,?)";
		$this->db->query($sql,array($user_id,$music_id));
		$this->db->query("UPDATE music SET skip_cnt = skip_cnt+1 WHERE music_id = $music_id");
	}
}
?>