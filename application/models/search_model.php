<?php
/*
author：赵旭东
note：王莉淋
1st revised：11.10
*/
class search_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
    //buildindex是建索引，这部分可以几天调用一次就可以 --by wll
	function buildindex(){
		//scws_new()调用了scws分词系统，这个系统需要手动配置。配置的方法参照“配置说明.doc”。--by wll
		$so = scws_new();
		$so->set_charset('utf8');
		//$so->set_dict('/usr/local/scws/etc/dict.utf8.xdb');
		//$so->set_rule('/usr/local/scws/etc/rules.utf8.ini');
		$so->set_ignore(1);
		
   		$sql="SELECT musician.nickname as nickname, musician.name as musician, musician.introduction as introduction, music.name as music, music.story as story, music.music_id as id FROM litit.musician
				left join music_musician
				on musician.musician_id = music_musician.musician_id
				inner join music
				on music_musician.music_id = music.music_id;";
   		$query=$this->db->query($sql);
   		//echo $query[0];
   		foreach($query->result() as $row){
			$text = $row->nickname . ' ' . $row->musician . ' ' . $row->introduction . ' ' . $row->music . ' ' . $row->story;
			
			$so->send_text($text);
			while ($tmp = $so->get_result())
			{
				foreach ($tmp as $result)
				{
					$sql = "select word_id from word where word = ?";
					$isExist = $this->db->query($sql, $result['word'])->row_array();
					if(!$isExist)
					{
						if($result['idf'] > 0) 
						{
							//echo $result['word'];
							$sql = "INSERT INTO word(word) VALUES(?)";
							$this->db->query($sql, array($result['word']));
							$sql = "select word_id from word where word = ?";
							$id = $this->db->query($sql, $result['word'])->row_array();
							$sql = "INSERT INTO wordindex(word_id, music_id, location) values(?, ?, ?)";
							$this->db->query($sql, array($id['word_id'], $row->id, $result['off']));
							echo "Success";
						//echo 'Succe
						}
					}
					else
                    {
						$sql = "INSERT INTO wordindex(word_id, music_id, location) values(?, ?, ?)";
						$this->db->query($sql, array($isExist['word_id'], $row->id, $result['off']));
						echo "Success";
					}
				}
			}
			
         }
     }
     //接收的参数($keywords)是一个字符串数组，会返回一个music的列表
     function search($keywords) {
     	//echo $keywords;
     	$score = 0;
     	$arrayHash = array();
     	foreach($keywords as $keyword)
     	{
     		//echo $keyword;
     		$sql = "select distinct music_id from wordindex inner join word on wordindex.word_id = word.word_id where word = ?";
     		$query = $this->db->query($sql, array($keyword));
     		$result = $query->result_array();
    		foreach($result as $row)
    		{
    			if(isset($arrayHash[$row['music_id']]))
    				$arrayHash[$row['music_id']] += 1;
    			else
    				$arrayHash[$row['music_id']] = 1;
    		}
     	}
     	asort($arrayHash);
     	$pre_result = array_reverse($arrayHash, TRUE);
        // make $result from $pre_result, transform the key value pair into 
        // objects. By jchnxu
        $result = array();
        foreach ($pre_result as $key=>$value) {
            $result_row = new stdClass;
            $result_row->music_id = $key;
            $result_row->hash = $value;
            array_push($result, $result_row);
        }
        return $result;
     }
  }
?>
