<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sign_up extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		header('Content-Type: text/html;charset=utf-8');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function index(){
        $this->load->model('user_model');
        $this->load->model('musician_model');
        $this->load->model('music_model');
        if($this->input->post('type')=="1"){
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('password2','Password Config','required|matches[password]');
            $this->form_validation->set_rules('name','Nickname');
            $this->form_validation->set_rules('name2','Name','required|min_length[2]');
            $this->form_validation->set_rules('birthday','Birthday');                        
            $result=$this->user_model->check($this->input->post('email'));            
             if ($this->form_validation->run() == FALSE){                    
                    echo'注册失败，请返回'.anchor('home','上一页').'，检查并重新输入注册信息。<br/><br/>';
                    echo'可能原因：</br>1.email地址不正确；<br/>';
                    echo'           2.email地址已被注册过；<br/>';
                    echo'           3.密码长度小于5个长度；<br/>';
                    echo'           4.确认密码与输入密码不一致；<br/>';
                    echo'           5.姓名长度小于5个长度。';
                }else{
                    if(!$result){ 
                        $data['nickname'] = $this->input->post('name');
                        $data['email'] = $this->input->post('email');
                        $data['password'] = $this->input->post('password');
                        $data['name'] = $this->input->post('name2');
                        $data['gender'] = $this->input->post('gender');
                        $data['birthday'] = $this->input->post('birthday');
						$this->db->insert('user',$data);
						$data['type'] = $this->input->post('type');
                        $this->session->set_userdata($data);
						
						$data = $this->music_model->rand();
						$data['username'] = $this->input->post('name2');
						$data['musician'] = $this->musician_model->check_id($data['musicianid']);
						$data['list']= $this->music_model->getallmusic_by_musicianid($data['musicianid']);
						$data['tag']=$this->music_model->gettag_by_id($data['id']);
						$this->load->view('home_in',$data);	
                        }else{
                            echo'注册失败，请返回'.anchor('home','上一页').'，检查并重新输入注册信息。<br/><br/>';
                            echo'可能原因：</br>1.email地址不正确；<br/>';
                            echo'           2.email地址已被注册过；<br/>';
                            echo'           3.密码长度小于5个长度；<br/>';
                            echo'           4.确认密码与输入密码不一致；<br/>';
                            echo'           5.姓名长度小于5个长度。';
                        }
            }
        }else{
            $this->form_validation->set_rules('email','Email','required|min_length[6]');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('password2','Password Confirmation','required|matches[password]');
            $this->form_validation->set_rules('name','Nickname');
            $this->form_validation->set_rules('name2','Name','required|min_length[5]');
            $this->form_validation->set_rules('birthday','Birthday');
            $this->form_validation->set_rules('identity','Identity','required');
            $this->form_validation->set_rules('introduction','Introduction','required');
                       
            $result=$this->musician_model->check_user($this->input->post('email'));
            
             if ($this->form_validation->run() == FALSE){
                    
                    echo'注册失败，请返回'.anchor('home','上一页').'，检查并重新输入注册信息。<br/><br/>';
                    echo'可能原因：</br>1.email地址不正确；<br/>';
                    echo'           2.email地址已被注册过；<br/>';
                    echo'           3.密码长度小于5个长度；<br/>';
                    echo'           4.确认密码与输入密码不一致；<br/>';
                    echo'           5.姓名没有填写或姓名长度小于5个长度；';
                    echo'           6.身份证号没有填写；<br/>';
                    echo'           7.introduction没有填写；<br/>';

                }else{
                    if(!$result){ 
                    $data['nickname'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = $this->input->post('password');
                    $data['name'] = $this->input->post('name2');
                    $data['gender'] = $this->input->post('gender');
                    $data['birthday'] = $this->input->post('birthday');
                    $data['identity'] = $this->input->post('identity');
                    $data['introduction'] = $this->input->post('introduction');
                    $data['attention'] = $this->input->post('attention');
                    $data['portaitdir'] = $this->input->post('portaitdir');
                    $data['certificate'] = $this->input->post('certificate');   
					
                    $this->db->insert('musician',$data);
                    $data['type'] = $this->input->post('type');
                    $this->session->set_userdata($data);	
	
					$data = $this->music_model->rand();
					$data['username'] = $this->input->post('name2');
					$data['musician'] = $this->musician_model->check_id($data['musicianid']);
					$data['list']= $this->music_model->getallmusic_by_musicianid($data['musicianid']);
					$data['tag']=$this->music_model->gettag_by_id($data['id']);
					$this->load->view('home_in',$data);	
					
                    }else{
                            echo'注册失败，请返回'.anchor('home','上一页').'，检查并重新输入注册信息。<br/><br/>';
                    echo'可能原因：</br>1.email地址不正确；<br/>';
                    echo'           2.email地址已被注册过；<br/>';
                    echo'           3.密码长度小于5个长度；<br/>';
                    echo'           4.确认密码与输入密码不一致；<br/>';
                    echo'           5.姓名没有填写或姓名长度小于5个长度；';
                    echo'           6.身份证号没有填写；<br/>';
                    echo'           7.introduction没有填写；<br/>';

                    }
                }
        }
    }
		
}
?>
