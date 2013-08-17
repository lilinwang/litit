<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function index(){
	    if($this->session->userdata('usertype') == '1'){
			$data['user_id']=$this->session->userdata('userid');
			$this->load->model('collect_model');
			$this->load->model('follow_model');
			$this->load->model('download_model');
			$data['collects']=$this->collect_model->display($data['user_id']);
			$data['follows']=$this->follow_model->display($data['user_id']);
			$data['downloads']=$this->download_model->display($data['user_id']);
            $this->load->view('personal',$data);
		}else{
			$this->load->model('collectm_model');
			$this->load->model('followm_model');
			$this->load->model('upload_model');
			$this->load->model('downloadm_model');
			$data['musician_id']=$this->session->userdata('userid');
			$data['collects']=$this->collectm_model->display($data['musician_id']);
			$data['follows']=$this->followm_model->display($data['musician_id']);
			$data['uploads']=$this->upload_model->display($data['musician_id']);
			$data['downloads']=$this->downloadm_model->display($data['musician_id']);
            $this->load->view('personalm',$data);
	    }
	}
	
}

?>
