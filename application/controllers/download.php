<?php
class Download extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('music_model');
		$this->load->helper(array('form', 'url','download'));
	}
	function index(){
		$extension='';
		$files_array = array();
		$dir_handle = @opendir('./upload/') or die("There is an error with your file directory!");
		while ($file = readdir($dir_handle))
		{
			if($file{0}=='.') continue;
			$endmime =explode('.',$file);
			$extension = strtolower(end($endmime));
			//if($extension == 'php') continue;
			$files_array[]=$file;
		}
		sort($files_array,SORT_STRING);
		
		$file_downloads=array();
		//$file_downloads = $this->music_model->get_downloadcnt();
		$data['files_array']=$files_array;
		$data['file_downloads']=$file_downloads;
		$this->load->view('download_view',$data);
	}
	function do_download()
	{
		// Error reporting:
		parse_str($_SERVER['QUERY_STRING'], $_GET);
		download('./upload/'.$_GET['file']);
	}
}