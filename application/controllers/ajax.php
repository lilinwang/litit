<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function index()
    {
        exit('Access denied');
    }
    
    function get_message_push()
    {
        $this->load->model('follow_model');
        $data['musician_name'] = "GAGA";
        $data['url'] = "http://example.com";
        $data['brief'] = "Aha!";
        $data['status'] = "success";
        if ($_POST['user_type'] == 1)
        {

        }
        else
        {

        }
        echo json_encode($data);
    }
	/*
	 * 用get方法传入user_id, sid, type, h, filter参数，返回一个播放列表(json)
	 * 
	 * user_id为用户id
	 * sid为正在播放的歌曲
	 * type为用户刚刚的操作，为一个字符，含义如下:
	 *     n : new, 刚刚打开播放器
	 *     p : playing, 歌曲正在播放，队列中还有歌曲，需要重新返回歌曲列表
	 *     e : end, 当前歌曲播放完毕，但是队列中还有歌曲
	 *     c : change, 改变筛选条件
	 *     s : skip, 用户点击下一首
	 *     r : rate, 用户点击喜欢
	 *     u : unrate, 用户取消点击喜欢
	 *     b : bye, 用户点击不喜欢，不再播放
	 * h最近播放的音乐(最多9个)，格式为|song.sid:type，如|1386894:s|444482:p|460268:s|48180:s|1027376:s|188257:s
	 * filter筛选条件,格式按需求来定
	 *
	 * 返回值目前为随机10首歌
	 */ 
	function fetchmusic()
	{
		$user_id=$this->input->get('user_id');
		$sid=$this->input->get('sid');
		$type=$this->input->get('type');
		$h=$this->input->get('h');
	   	$filter=$this->input->get('filter');

		$this->load->model('music_model');
		$data = $this->music_model->randmore();
		echo json_encode($data);
	}
    function getmusic()
    {
		$this->load->model('music_model');
        $this->load->model('musician_model');
		$data=$this->music_model->rand();
        $data['musician'] = $this->musician_model->check_id($data['musician_id']);
		$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
		$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
		echo json_encode($data);
    }
    function likemusic()
    {
		$this->load->model('music_model');
    	$this->music_model->collect_inc($_POST['musician_id'],$_POST['music_id'],$_POST['user_id'],$_POST['user_type']);	
    }
    function no_likemusic()
    {
		$this->load->model('music_model');
    	$this->music_model->collect_dec($_POST['musician_id'],$_POST['music_id'],$_POST['user_id'],$_POST['user_type']);	
    }
    function attention_musician()
    {
    	$this->load->model('music_model');
        $this->load->model('musician_model');
    	$data=$this->musician_model->attention_inc($_POST['musician_id'],$_POST['music_id'],$_POST['user_id'],$_POST['user_type']);
        echo $data;
    }
    function no_attention_musician()
    {
        $this->load->model('musician_model');
    	$data=$this->musician_model->attention_dec($_POST['musician_id'],$_POST['music_id'],$_POST['user_id'],$_POST['user_type']);
        echo $data;
    }
    function islike_follow()
    {
    	$this->load->model('collect_model');
        $this->load->model('follow_model');
		if ($_POST['user_type']==1)
       	{	$data['follow']=$this->follow_model->is_follow($_POST['user_id'],$_POST['musician_id']);
			$data['collect']=$this->collect_model->is_collect($_POST['user_id'],$_POST['music_id']);
		}else
		{	$data['follow']=$this->followm_model->is_follow($_POST['user_id'],$_POST['musician_id']);
			$data['collect']=$this->collectm_model->is_collect($_POST['user_id'],$_POST['music_id']);
		}
        echo json_encode($data);
    }
    function copyright_sign()
    {  
       $this->load->model('copyright_model'); 
       $this->copyright_model->insert_new_copyright($_POST['musician_id'],$_POST['user_id'],$_POST['music_id'],$_POST['name'],$_POST['company'],$_POST['identity'],$_POST['phone'],$_POST['email'],$_POST['content']);
    }
    function no_copyright_sign()
    {   
       $this->load->model('copyright_model'); 
       $this->copyright_model->drop_copyright($_POST['user_id'],$_POST['music_id'],$_POST['name'],$_POST['company'],$_POST['identity'],$_POST['phone'],$_POST['email'],$_POST['content']);
    }
    function iscopyright_sign()
    {
        $this->load->model('copyright_model'); 
       	$data=$this->copyright_model->is_copyright_sign($_POST['user_id'],$_POST['music_id']);
        echo $data;
    }
     function information_change()
    {
    	$this->load->model('user_model');
    	$this->load->model('musician_model');	
    	$data['name']=$_POST['name'];
    	$data['nickname']=$_POST['nickname'];
    	$data['gender']=$_POST['gender'];
    	$data['birthday']=$_POST['birthday'];
    	$data['introduction']=$_POST['self_intro'];
    	if($_POST['type']==1)
    	{
    	$this->user_model->update_by_id($data,$_POST['id']);   
    	}
    	else
    	{
    	$data['identity']=$_POST['identity'];
    	$this->musician_model->update_by_id($data,$_POST['id']);	
    	}
    }
    function check_constellation()
    {
        $this->load->model('user_model');
        $data=$this->user_model->check_constellation($_POST['birthday']); 
        echo $data;
    }
    function password_change()
    {   
    	$this->load->model('user_model');
    	$this->load->model('musician_model');
    	if($_POST['type']==1)
    	{
    	$user=$this->user_model->get_from_id($_POST['id']);
    	$password_old=$user['password'];
    	$password=sha1($_POST['password'].$user['reg_time']);
    	$password1=sha1($_POST['password1'].$user['reg_time']);
    	$password2=sha1($_POST['password2'].$user['reg_time']);
    	if($password!=$password_old){$data=1;} 
    	else
    	{
    		if($password1!=$password2){$data=2;}
    		else
    		{
    		if(strlen($_POST['password1'])<8){$data=3;}
    		else
    		{
    		$data1['password']=$password1;
    		$this->user_model->update_by_id($data1,$_POST['id']);
    		$data=4;
    		}
    	    }
	    }
	    }
	    else
	    {
	    $musician=$this->musician_model->get_from_id($_POST['id']);
    	$password_old=$musician['password'];
    	$password=sha1($_POST['password'].$musician['reg_time']);
    	$password1=sha1($_POST['password1'].$musician['reg_time']);
    	$password2=sha1($_POST['password2'].$musician['reg_time']);
    	if($password!=$password_old){$data=1;} 
    	else
    	{
    		if($password1!=$password2){$data=2;}
    		else
    		{
    		if(strlen($_POST['password1'])<8){$data=3;}
    		else
    		{
    		$data1['password']=$password1;
    		$this->musician_model->update_by_id($data1,$_POST['id']);
    		$data=4;
    		}
    	    }
	    }	
	    }
   	echo $data;
    }
    

    /*
        upload music

        errno 1, parameter error
        errno 2, files have been removed
    */
    function upload_music() {
        $this->load->model('music_model');
        $this->load->model('tag_model');
        $this->load->model('genre_model');
        $this->load->model('music_tag_model');
        $this->load->model('music_genre_model');

        // required parameters 
        if ("" == trim($_POST['musician_id']) ||
            "" == trim($_POST['music_name']) ||
            "" == trim($_POST['music_url']))
        {
            echo '{"errno":1, "errmsg":"参数错误"}';
            return;
        }
        $musician_id = trim($_POST['musician_id']);
        $music_name= trim($_POST['music_name']);
        $music_url= trim($_POST['music_url']);

        // optional parameters
        $image_url = trim($_POST['music_image_url']);
        $album = trim($_POST['album']);
        $lyrics_by = trim($_POST['lyrics_by']);
        $composed_by = trim($_POST['composed_by']);
        $arranged_by = trim($_POST['arranged_by']);
        $disc_company = trim($_POST['disc_company']);
        $perform_time = trim($_POST['perform_time']);
        $genres = trim($_POST['genres']);
        $tags = trim($_POST['tags']);
        $story = trim($_POST['story']); 

        // insert into db
        $music_id = $this->music_model->insert_new_no_url(
            $musician_id,
            $music_name,
            //$album, currently unavailable
            $lyrics_by,
            $composed_by,
            $arranged_by,
            $disc_company,
            $perform_time,
            $story
        );

        // move music file and image file
        $new_music_url = 'upload/music/' . 'user_' . $musician_id . '/music_' . $music_id;
        $new_music_url .= '.' . pathinfo($music_url, PATHINFO_EXTENSION); 
        if (!is_dir(dirname($new_music_url))) {
            mkdir(dirname($new_music_url), 0777, true);
        }
        $music_ok = @rename($music_url, $new_music_url);

        $image_ok = true;
        $new_image_url = null;
        if (!empty($image_url)) {
            $new_image_url = 'upload/image/' . 'user_' . $musician_id . '/image_' . $music_id;
            $new_image_url .= '.' . pathinfo($image_url, PATHINFO_EXTENSION); 
            if (!is_dir(dirname($new_image_url))) {
                mkdir(dirname($new_image_url), 0777, true);
            }
            $image_ok = @rename($image_url, $new_image_url);
        }

        // check move ok, for they may be deleted in certain time
        if (!$music_ok || !$image_ok) {
            $errmsg = '您很长时间没有操作了，请重新上传';
            if(!$music_ok) {
                $errmsg .= '音乐';
            }
            if(!$image_ok && !empty($image_url)) {
                if (!$music_ok) $errmsg .= '和';
                $errmsg .= '图片';
            }
            $this->music_model->drop_music_by_id($music_id); // roll back insertion
            echo '{"errno":2, "errmsg":"' . $errmsg . '"}';
            return;
        }
        // update the url
        $this->music_model->update_url($music_id, $new_music_url, $new_image_url);

        // update tag and genre
        $tag_id = $this->tag_model->get_id_by_name($tags);
        if ($tag_id == null) $tag_id = $this->tag_model->add_by_name($tags);
        $this->music_tag_model->add($tag_id, $music_id);

        $genre_id = $this->genre_model->get_id_by_name($genres);
        if ($genre_id == null) $genre_id = $this->genre_model->add_by_name($genres);
        $this->music_genre_model->add($genre_id, $music_id);

        echo '{"errno":0, "msg":"上传音乐 ' . $music_name . ' 成功！"}';
    }
}
