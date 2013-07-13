<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        header('Content-Type: text/html;charset=utf-8');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->database();
	}
	function index(){
        $this->load->model('musician_model');
        $this->load->model('user_model');
        $this->load->model('music_model');

        if(!$this->session->userdata('is_login')){
            $data = $this->music_model->rand();
            $data['musician'] = $this->musician_model->check_id($data['musician_id']);
			$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
			$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
            $this->load->view('home',$data);
        }else{
			$data = $this->music_model->rand();
            $data['useremail'] = $this->session->userdata('email');
            $data['usertype'] = $this->session->userdata('type');
            if($data['usertype']==1){
                $name=$this->user_model->check($data['useremail']);
            }
            elseif($data['usertype']==0){
                $name=$this->musician_model->check_user($data['useremail']);
            }
            $data['username'] = $name[0]['name'];
            $data['musician'] = $this->musician_model->check_id($data['musician_id']);
			$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
			$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
            //var_dump($data);
            $this->load->view('home_in',$data);
        }
	}
	
	function ajax_music(){
		$this->load->model('music_model');
		$music=$this->music_model->rand();
		echo json_encode($music);
	}
}

?>
