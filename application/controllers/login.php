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
        $this->load->model('user_model');
        if($this->input->post('type')=="1"){
            $result=$this->user_model->login($this->input->post('email'),$this->input->post('password'));
            if ($result) {
                $session['is_login'] = TRUE;
				$this->session->set_userdata($session);
                $session['email'] = $this->input->post('email');
                $session['password'] = $this->input->post('password');
                $session['type'] = 1;
				$username=$this->user_model->check($this->input->post('email'));
				$session['userid'] =$username[0]['user_id'];
                $this->session->set_userdata($session);	
                
                //echo $name[0]["name"];
                $data = $this->music_model->rand();
                $data['username'] = $username[0]['name'];
				$data['musician'] = $this->musician_model->check_id($data['musician_id']);
				$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
				$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
                $this->load->view('home_in',$data);
            }else {
                    echo '登陆失败，返回'.anchor('home','上一页').'，请检查你的登陆信息并重新登陆或进行注册操作。';
            }
        }else{
            $this->load->model('musician_model');
            $result=$this->musician_model->login($this->input->post('email'),$this->input->post('password'));
            if ($result) {
                $session['is_login'] = TRUE;
				$this->session->set_userdata($session);
                $session['email'] = $this->input->post('email');
                $session['password'] = $this->input->post('password');
                $session['type'] = '0';
				$username=$this->musician_model->watch_by_email($this->input->post('email'));
				$session['userid'] =$username[0]['musician_id'];
                $this->session->set_userdata($session);	
                
				
                //echo $name[0]["name"];
                $data = $this->music_model->rand();
                $data['username'] = $username[0]['name'];
				$data['musician'] = $this->musician_model->check_id($data['musician_id']);
				$data['list']= $this->music_model->getallmusic_by_musicianid($data['musician_id']);
				$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
                $this->load->view('home_in',$data);
            }else {
                    echo '登陆失败，返回'.anchor('home','上一页').'，请检查你的信息。';
            }
        }        
    }
}
?>