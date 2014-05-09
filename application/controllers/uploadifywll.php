<?php 

class Upload extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        header('Content-Type: text/html;charset=utf-8');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->database();
	}
	
	function index(){
			if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
				$this->load->model('musician_model');
				$this->load->model('music_model');
				$music_id=$this->music_model->insert_new_music($_POST['name'],$_POST['story'],$_POST['userid']);
			
				$targetFolder = '/litit/upload/music/user_'.$_POST['userid'];// Relative to the root
				$verifyToken = md5('unique_salt' . $_POST['timestamp']);
				
				$tempFile = $_FILES['Filedata']['tmp_name'];
				$_FILES['Filedata']['name']=$music_id.'mp3';
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
				// Validate the file type
				$fileTypes = array('mp3','jpg'); // File extensions
				$fileParts = pathinfo($_FILES['Filedata']['name']);
		
				if (in_array($fileParts['extension'],$fileTypes)) {
					move_uploaded_file($tempFile,iconv("UTF-8","gb2312", $targetFile));		
					echo $targetFile;
					echo '1';
				} else {
					echo $targetFile;
					echo 'Invalid file type.';
				}
			}
	}
}
?>
