<?php
class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->model("music_model");
        $this->load->library('session');
	}
	function index()
	{
		$this->load->model('musician_model');
        $this->load->model('user_model');
        $this->load->model('music_model');
        $check1 = $this->musician_model->check_user($this->session->userdata('email'));
        $check2 = $this->user_model->check($this->session->userdata('email'));
        if(!$check1&&!$check2){
            echo '你还没有注册，点击'.anchor('home','这里').'先注册账号。';
        }else{
            $identity = $this->session->userdata('type');
            if($identity==0){
                $x = $this->session->userdata('email');
                $result = $this->musician_model->check_user($x);
                $a['musicianid'] = $result[0]['id'];
                $this->load->view('upload_view',$a);//array('error' => ' ' )
            }else{
                echo '你不是音乐人，没有上传音乐的权限，点击'.anchor('home','这里').'返回主界面。';
            }
        }
	}
	function do_upload_music($musician_id)
	{
        if(!file_exists('./upload/music/'))
			mkdir('./upload/music/',0777);
		if(!file_exists('./upload/music/user_'.$musician_id.'/'))
			mkdir('./upload/music/user_'.$musician_id.'/',0777);
		$config['upload_path'] = './upload/music/user_'.$musician_id."/";
		$config['allowed_types'] = 'mp3';
		//允许上传的文件类型
		$config['max_size']='20000000';
		$this->load->library('upload', $config);
		if ( ! isset($_FILES['userfile'])){return FALSE;}
		$file_name=$_FILES['userfile']['name'];
		$music_id=$this->music_model->insert_new_music($file_name,'暂无故事。',$musician_id);
		$_FILES['userfile']['name']='music_'.$music_id.'.mp3';
		if ( ! $this->upload->do_upload())
		{
			$this->music_model->drop_music_by_id($music_id);
			$data['info']=$this->upload->display_errors();
			$data['html']='<form id="subform" action="'.base_url().'index.php/upload/
					do_upload_music/'.$musician_id.
					'" method="post" accept-charset="utf-8" enctype="multipart/form-data">'.
					'音乐<input type="file" name="userfile" size="20" />'.
					'<input id="button_sub" type="button" value="上传音乐" /></form>';
			$this->load->view('upload_view', $data);
		}
		else
		{
			$music_upload_data=$this->upload->data();
			$data['info']='<h3>Your music was successfully uploaded!</h3><ul>';
			foreach ($music_upload_data as $item=>$value):
				$data['info']=$data['info']."<li>".$item.$value."</li>";
			endforeach;
			$data['info']=$data['info'].'</ul>';
			$data['html']='<form id="subform" action="'.base_url().'index.php/upload/
					do_upload_image/'.$musician_id.'/'.$music_id.
					'" method="post" accept-charset="utf-8" enctype="multipart/form-data">'.
					'为音乐上传图片<input type="file" name="userfile" size="20" /><br/>'.
					 '<input id="button_sub" type="button" value="上传图片" /></form>';
			$this->load->view('upload_view', $data);
		}
	}

	function do_upload_image($musician_id,$music_id)
	{
		if(!file_exists('./upload/image/'))
			mkdir('./upload/image/',0777);
		if(!file_exists('./upload/image/user_'.$musician_id.'/'))
			mkdir('./upload/image/user_'.$musician_id.'/',0777);
		$config['upload_path'] = './upload/image/user_'.$musician_id."/";
		$config['allowed_types'] = 'jpg';
		//允许上传的文件类型
		$config['max_size']='20000000';
		$this->load->library('upload', $config);
		if ( ! isset($_FILES['userfile'])){return FALSE;}
		//$file_name=$_FILES['userfile']['name'];
		$_FILES['userfile']['name']='image_'.$music_id.'.jpg';
		if ( ! $this->upload->do_upload())
		{
			$data['info']=$this->upload->display_errors();
			$data['html']='<form id="subform" action="'.base_url().'index.php/upload/
					do_upload_image/'.$musician_id.'/'.$music_id.
					'" method="post" accept-charset="utf-8" enctype="multipart/form-data">'.
					'为音乐上传图片<input type="file" name="userfile" size="20" /><br/>'.
					'<input id="button_sub" type="button" value="上传图片" /></form>';
			$this->load->view('upload_view', $data);
		}
		else
		{
			$image_upload_data=$this->upload->data();
			$data['info']='<h3>Your image was successfully uploaded!</h3><ul>';
			foreach ($image_upload_data as $item=>$value):
				$data['info']=$data['info']."<li>".$item.$value."</li>";
			endforeach;
			$data['info']=$data['info'].'</ul>';
			$data['html']='<p><a id="upload_another" href="'.base_url().'index.php/upload">Upload Another Music!</a></p>';
			$this->load->view('upload_view', $data);
		}
	}
}

?>