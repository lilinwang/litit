<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
    }
	
	function index() {
        // 获得参数
        $user_type = $this->input->post('user_type');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // 读取model
        $this->load->model('user_model');
	
	    // 判断是否通过登陆
		$result = $this->user_model->check_login($email, $password);
        if ($result == 1) { // 1表示登陆成功
            // 设置session中的参数
            $row = $this->user_model->get_exposable_row_by_email($email);
            $this->session->set_userdata('is_logged_in', true);
            $this->session->set_userdata('user_type', $user_type);
            $this->session->set_userdata('user_id', $row['user_id']);
            
            redirect(base_url());
        }
        else {
            $this->session->set_flashdata('login_prompt', '邮箱或者密码错误');
            redirect(base_url());
        }
    }
}