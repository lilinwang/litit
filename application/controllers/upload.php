<?php
class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->model("music_model");
        $this->load->library('session');
        $this->load->model('musician_model');
        $this->load->model('user_model');
        $this->load->model('music_model');
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
            $identity = $this->session->userdata('usertype');
            if($identity==0){
                $x = $this->session->userdata('email');
                $result = $this->musician_model->check_user($x);
                $a['musician_id'] = $result[0]['musician_id'];
                $this->load->view('upload_view',$a);//array('error' => ' ' )
            }else{
                echo '你不是音乐人，没有上传音乐的权限，点击'.anchor('home','这里').'返回主界面。';
            }
        }
	}
	function upload_music()
	{
	
        if(!file_exists('./upload/music/'))
			mkdir('./upload/music/',0777);
		if(!file_exists('./upload/music/user_'.$_POST['musician_id'].'/'))
			mkdir('./upload/music/user_'.$_POST['musician_id'].'/',0777);
		if(!file_exists('./upload/image/'))
			mkdir('./upload/image/',0777);
		if(!file_exists('./upload/image/user_'.$_POST['musician_id'].'/'))
			mkdir('./upload/image/user_'.$_POST['musician_id'].'/',0777);
		$config['upload_path'] = './upload/music/user_'.$_POST['musician_id']."/";
		$config['allowed_types'] = 'mp3';
		//允许上传的文件类型
		$config['max_size']='20000000';
		$this->load->library('upload', $config);
		if ( ! isset($_FILES['userfile1'])){return FALSE;}
		$file_name=$_FILES['userfile1']['name'];
		$music_id=$this->music_model->insert_new_music($file_name,$_POST['story'],$_POST['musician_id']);
		$_FILES['userfile1']['name']='music_'.$music_id.'.mp3';
		$_FILES['userfile2']['name']='image_'.$music_id.'.jpg';	
		if ($this->upload->do_upload('userfile1'))
		{
			
			$config['upload_path'] = './upload/image/user_'.$_POST['musician_id']."/";
	  		$config['allowed_types'] = 'gif|jpg|png';
	  		$config['max_size']='20000000';
			$this->load->library('upload', $config);
			if ( ! isset($_FILES['userfile2'])){return FALSE;}
			
		if ($this->upload->do_upload('userfile2'))
			{
			 $map['song_writer']=$_POST['song_writer'];
			 $map['musicby']=$_POST['musicby'];
			 $map['arrangement']=$_POST['arrangement'];
			 $map['disc_company']=$_POST['disc_company'];
			 $map['perform_time']=$_POST['perform_time'];
			 $map['style']=$_POST['style'];
			 $this->music_model->update_by_id($map,$music_id);
			 echo "上传成功";
			}
			else
			{
				echo "照片传送失败！";
			}
		}
		else
		{
		$image_upload_data=$this->upload->data();		
		}
	}

/*	function upload_music_image()
	{

		if(!file_exists('./upload/image/'))
			mkdir('./upload/image/',0777);
		if(!file_exists('./upload/image/user_'.$_POST['musician_id'].'/'))
			mkdir('./upload/image/user_'.$_POST['musician_id'].'/',0777);
		$config['upload_path'] = './upload/image/user_'.$_POST['musician_id']."/";
		$config['allowed_types'] = 'gif|jpg|png';
		//允许上传的文件类型
		$config['max_size']='20000000';
		$this->load->library('upload', $config);
		if ( ! isset($_FILES['userfile'])){return FALSE;}
		//$file_name=$_FILES['userfile']['name'];
		$_FILES['userfile']['name']='image_'.$_POST['music_id'].'.jpg';
		if ( $this->upload->do_upload())
		{
               $map['image_dir']='upload/image/user_'.$_POST['musician_id']."/".'image_'.$_POST['music_id'].'.jpg';
			   $this->music_model->update_by_id($map,$_POST['music_id']);
		}
		else
		{
			echo "错误";

        }
	}*/
	function upload_image()
	{

		if($_POST['type']==1)
		{
			if(!file_exists('./upload/user_image/'))
				mkdir('./upload/user_image/',0777);
			if(!file_exists('./upload/user_image/user'.$_POST['id'].'/'))
				mkdir('./upload/user_image/user'.$_POST['id'].'/',0777);
			$config['upload_path'] = './upload/user_image/user'.$_POST['id']."/";
			$config['allowed_types'] = 'gif|jpg|png';
			//允许上传的文件类型
			$config['max_size']='20000000';
			$this->load->library('upload', $config);
			if ( ! isset($_FILES['userfile'])){return FALSE;}
		
			//$file_name=$_FILES['userfile']['name'];
			$_FILES['userfile']['name']=$_POST['id'].'.jpg';
			if(file_exists('./upload/user_image/user'.$_POST['id']."/".$_POST['id'].'.jpg'))
			{unlink('./upload/user_image/user'.$_POST['id']."/".$_POST['id'].'.jpg');}
			if ( $this->upload->do_upload())
			{
				   $map['port_dir']='upload/user_image/user'.$_POST['id']."/".$_POST['id'].'.jpg';
				   $this->user_model->update_by_id($map,$_POST['id']);
			 		$data=	"成功";
					
			}
			else
			{
				$image_upload_data=$this->upload->data();
			
			}
			}
		else
		{
			if(!file_exists('./upload/image/'))
				mkdir('./upload/image/',0777);
			if(!file_exists('./upload/image/user_'.$_POST['id'].'/'))
				mkdir('./upload/image/user_'.$_POST['id'].'/',0777);
			$config['upload_path'] = './upload/image/user_'.$_POST['id']."/";
			$config['allowed_types'] = 'gif|jpg|png';
			//允许上传的文件类型
			$config['max_size']='20000000';
			$this->load->library('upload', $config);
			if ( ! isset($_FILES['userfile'])){return FALSE;}
			//$file_name=$_FILES['userfile']['name'];
			$_FILES['userfile']['name']='musician_'.$_POST['id'].'.jpg';
			if(file_exists('./upload/image/user_'.$_POST['id']."/".'musician_'.$_POST['id'].'.jpg'))
			{unlink('./upload/image/user_'.$_POST['id']."/".'musician_'.$_POST['id'].'.jpg');}
			if ( $this->upload->do_upload())
			{
			 	$map['portaitdir']='upload/image/user_'.$_POST['id']."/".'musician_'.$_POST['id'].'.jpg';
				$this->musician_model->update_by_id($map,$_POST['id']);
		     	$data=	"成功";
				
		}
		else
		{
		$data="失败";
		
		}
		}
	}
}

?>