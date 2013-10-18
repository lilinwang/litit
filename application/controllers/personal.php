<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function index(){
			$this->load->model('user_model');
			$this->load->model('musician_model');
			$data['usertype']=$this->session->userdata('usertype');
	    if($this->session->userdata('usertype') == '1'){
			$data['user_id']=$this->session->userdata('userid');
			$data['user']=$this->user_model->get_from_id($data['user_id']);
			$data['constellation']=$this->user_model->check_constellation($data['user']['birthday']);
			$data['check_photo']=$this->user_model->check_photo($data['user_id']);
			$this->load->model('collect_model');
			$this->load->model('follow_model');
			$this->load->model('download_model');
			$this->load->model('copyright_model');
			$data['collects']=$this->collect_model->display($data['user_id']);
			$data['follows']=$this->follow_model->display($data['user_id']);
			$data['downloads']=$this->download_model->display($data['user_id']);
			$data['copyrights']=$this->copyright_model->display($data['user_id']);
            $this->load->view('personal',$data);
		}else{
			$this->load->model('collectm_model');
			$this->load->model('followm_model');
			$this->load->model('upload_model');
			$this->load->model('downloadm_model');
			$this->load->model('copyrightm_model');
			$data['musician_id']=$this->session->userdata('userid');
			$data['musician']=$this->musician_model->get_from_id($data['musician_id']);
			$data['constellation']=$this->musician_model->check_constellation($data['musician']['birthday']);
			$data['check_photo']=$this->musician_model->check_photo($data['musician_id']);
			$data['collects']=$this->collectm_model->display($data['musician_id']);
			$data['copyrights']=$this->copyrightm_model->display($data['musician_id']);
			$data['follows']=$this->followm_model->display($data['musician_id']);
			$data['uploads']=$this->upload_model->display($data['musician_id']);
			$data['downloads']=$this->downloadm_model->display($data['musician_id']);
            $this->load->view('personalm',$data);
	    }
	}
	
}

?>
