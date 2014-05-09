<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sign_up extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		header('Content-Type: text/html;charset=utf-8');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}
	function index() {
		date_default_timezone_set("PRC");
        $time_stamp = date("Y-m-d H:i:s");
        // 获得参数
        $user_type = $this->input->post('user_type');
        $email = $this->input->post('email');
        $password = sha1( $this->input->post('password').$time_stamp);    
        // 读取model
        if($user_type=="0"){
			$this->load->model('musician_model', 'user_model');
		} else {
			$this->load->model('user_model');
		};
		// 检查是否邮箱已被注册
		$email_exists = $this->user_model->email_exists($this->input->post('email'));          
        if(!$email_exists){
			// 设置session中的参数，自动登录
			$this->user_model->register_simple($email,$password,$time_stamp);
			$row = $this->user_model->get_exposable_row_by_email($email);
            $this->session->set_userdata('is_logged_in', true);
            $this->session->set_userdata('user_type', $user_type);
            $this->session->set_userdata('user_id', $row['user_id']);
			redirect(base_url());
		}
		else {
			$this->session->set_flashdata('sign_up_prompt', '该邮箱已被注册');
            redirect(base_url());
		}	 
    }
	/*function index(){
        $this->load->model('user_model');
        $this->load->model('musician_model');
        $this->load->model('music_model');
        if($this->input->post('usertype')=="1"){ // 用户类型是听众
            $result=$this->user_model->check($this->input->post('email'));            
            if(!$result){ 
                        $data['nickname'] = $this->input->post('name');
                        $data['email'] = $this->input->post('email');
                        $data['password'] =sha1( $this->input->post('password').$time_stamp);
                        $data['reg_time'] = $time_stamp;
                        $data['name'] = $this->input->post('name2');
                        $data['gender'] = $this->input->post('gender');
                        $data['birthday'] = $this->input->post('birthday');
						$this->db->insert('user',$data);
						$data['usertype'] = $this->input->post('usertype');
                        $this->session->set_userdata($data);
						
						$data = $this->music_model->rand();
						$data['useremail'] = $this->session->userdata('email');
						$data['usertype'] = $this->session->userdata('usertype');																		
						$name=$this->user_model->check($data['useremail']);
						$this->load->model('collect_model');
						$this->load->model('follow_model');
						$this->load->model('copyright_model');
						$data['follow'] =$this->follow_model->is_follow($name[0]['user_id'],$data['musician_id']);
						$data['collect'] =$this->collect_model->is_collect($name[0]['user_id'],$data['music_id']);
						$data['copyright'] =$this->copyright_model->is_copyright_sign($name[0]['user_id'],$data['music_id']);
						$data['userid'] =$name[0]['user_id'];
						$data['username'] = $name[0]['name'];
						$data['musician'] = $this->musician_model->check_id($data['musician_id']);
						$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
						$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
						$data['message']=' ';
						$this->load->view('home_view',$data);			           	
            }else{
                    $data = $this->music_model->rand();
					$data['musician'] = $this->musician_model->check_id($data['musician_id']);
					$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
					$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
					$data['message']='该邮箱已被注册';
					$this->load->view('home_view',$data);
            };
        }else{                     
            $result=$this->musician_model->check_user($this->input->post('email'));        
            if(!$result){ 
                    $data['nickname'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = sha1($this->input->post('password').$time_stamp);
                    $data['reg_time'] = $time_stamp;
                    $data['name'] = $this->input->post('name2');
                    $data['gender'] = $this->input->post('gender');
                    $data['birthday'] = $this->input->post('birthday');
                    $data['identity'] = $this->input->post('identity');
                    $data['introduction'] = $this->input->post('introduction');
                    $data['attention'] = $this->input->post('attention');
                    $data['portaitdir'] = $this->input->post('portaitdir');
                    $data['certificate'] = $this->input->post('certificate');   
					
                    $this->db->insert('musician',$data);
                    $data['usertype'] = $this->input->post('usertype');
                    $this->session->set_userdata($data);	
					
					$data = $this->music_model->rand();
					$data['useremail'] = $this->session->userdata('email');
					$data['usertype'] = $this->session->userdata('usertype');						
					$name=$this->musician_model->check_user($data['useremail']);
					$this->load->model('collectm_model');
					$this->load->model('followm_model');
					$this->load->model('copyrightm_model');
					$data['follow'] =$this->followm_model->is_follow($name[0]['musician_id'],$data['musician_id']);
					$data['collect'] =$this->collectm_model->is_collect($name[0]['musician_id'],$data['music_id']);
					$data['copyright'] =$this->copyrightm_model->is_copyright_sign($name[0]['musician_id'],$data['music_id']);
					$data['userid'] =$name[0]['musician_id'];
					$data['username'] = $name[0]['name'];
					$data['musician'] = $this->musician_model->check_id($data['musician_id']);
					$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
					$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
					$data['message']=' ';
					$this->load->view('home_view',$data);
					
            }else{
					$data = $this->music_model->rand();
					$data['musician'] = $this->musician_model->check_id($data['musician_id']);
					$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
					$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
					$data['message']='该邮箱已被注册';
					$this->load->view('home_view',$data);
            }
        }
     
    }		*/
}
?>
