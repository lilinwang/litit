<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		header('Content-Type: text/html;charset=utf-8');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
    }
	
	function index() {
        $this->load->model('musician_model');
        $this->load->model('music_model');
        
        if($this->input->post('usertype')=="1"){
			$this->load->model('user_model');
            $result=$this->user_model->login($this->input->post('email'),$this->input->post('password'));
		} else{
			$this->load->model('musician_model');
			$result=$this->musician_model->login($this->input->post('email'),$this->input->post('password'));
		};		
        if ($result==1) 
        {
                $session['is_login'] = TRUE;
				$this->session->set_userdata($session);
                $session['email'] = $this->input->post('email');
                $session['usertype'] = $this->input->post('usertype');
				if ($session['usertype']=="1") {
					$username=$this->user_model->check($this->input->post('email'));
					$session['userid'] =$username[0]['user_id'];
					$this->session->set_userdata($session);	
					$data = $this->music_model->rand();
					$data['userid'] =$username[0]['user_id'];
					$this->load->model('collect_model');
					$this->load->model('follow_model');
					$this->load->model('copyright_model');
					$data['follow'] =$this->follow_model->is_follow($username[0]['user_id'],$data['musician_id']);
					$data['collect'] =$this->collect_model->is_collect($username[0]['user_id'],$data['music_id']);
					$data['copyright'] =$this->copyright_model->is_copyright_sign($username[0]['user_id'],$data['music_id']);
				}else {					
					$username=$this->musician_model->watch_by_email($this->input->post('email'));
					$session['userid'] =$username[0]['musician_id'];
					$this->session->set_userdata($session);	
					$data = $this->music_model->rand();
					$data['userid'] =$username[0]['musician_id'];
					$this->load->model('collectm_model');
					$this->load->model('followm_model');
					$this->load->model('copyrightm_model');
					$data['follow'] =$this->followm_model->is_follow($username[0]['musician_id'],$data['musician_id']);
					$data['collect'] =$this->collectm_model->is_collect($username[0]['musician_id'],$data['music_id']);
					$data['copyright'] =$this->copyrightm_model->is_copyright_sign($username[0]['musician_id'],$data['music_id']);
				}
				
				$data['useremail'] = $this->session->userdata('email');
				$data['usertype'] = $this->session->userdata('usertype');
                $data['username'] = $username[0]['nickname'];
				$data['musician'] = $this->musician_model->check_id($data['musician_id']);
				$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
				$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
				$data['message']=' ';
                $this->load->view('home_in',$data);
        }
		else 
        {
            	$data = $this->music_model->rand();
				$data['musician'] = $this->musician_model->check_id($data['musician_id']);
				$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
				$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
				if($result==2) $data['message']='密码错误'; else $data['message']='用户名不存在';
				$this->load->view('home',$data);
        } 
    }
}
?>