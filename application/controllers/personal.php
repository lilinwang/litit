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
			$this->load->model('user_model');
			$result=$this->user_model->login($this->session->userdata('email'),$this->session->userdata('password'));
			$name=$this->user_model->check($this->session->userdata('email'));
            $data['name'] = $name[0]["name"];
			$data['nickname'] = $name[0]["nickname"];
			$data['email'] = $name[0]["email"];
			$data['birthday'] = $name[0]["birthday"];
			$data['user_id']=$this->session->userdata('userid');
			$this->load->model('collect_model');
			$this->load->model('follow_model');
			$this->load->model('upload_model');
			$this->load->model('download_model');
			$data['collects']=$this->collect_model->display($data['user_id']);
			$data['follows']=$this->follow_model->display($data['user_id']);
			$data['uploads']=$this->upload_model->display($data['user_id']);
			$data['downloads']=$this->download_model->display($data['user_id']);
            $this->load->view('personal',$data);
		}else{
		    $this->load->model('musician_model');
			$result=$this->musician_model->login($this->session->userdata('email'),$this->session->userdata('password'));
			$name=$this->musician_model->check_user($this->session->userdata('email'));
            $data['name'] = $name[0]["name"];
			$data['nickname'] = $name[0]["nickname"];
			$data['email'] = $name[0]["email"];
			$data['birthday'] = $name[0]["birthday"];
			$data['introduction'] = $name[0]["introduction"];
			$data['gender'] = $name[0]["gender"];
			$data['attention'] = $name[0]["attention"];
			$this->load->model('collect_model');
			$this->load->model('follow_model');
			$this->load->model('upload_model');
			$this->load->model('download_model');
			$data['musician_id']=$this->session->userdata('userid');
			$data['collects']=$this->collect_model->display($data['musician_id']);
			$data['follows']=$this->follow_model->display($data['musician_id']);
			$data['uploads']=$this->upload_model->display($data['musician_id']);
			$data['downloads']=$this->download_model->display($data['musician_id']);
            $this->load->view('personal',$data);
	    }
	}
	
}

?>
