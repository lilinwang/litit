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
        $time_stamp = date("Y-m-d H:i:s");
        if($this->input->post('usertype')=="1"){                       
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
						$this->load->view('home_in',$data);			           	
            }else{
                    $data = $this->music_model->rand();
					$data['musician'] = $this->musician_model->check_id($data['musician_id']);
					$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
					$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
					$data['message']='该邮箱已被注册';
					$this->load->view('home',$data);
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
					$this->load->view('home_in',$data);
					
            }else{
					$data = $this->music_model->rand();
					$data['musician'] = $this->musician_model->check_id($data['musician_id']);
					$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
					$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
					$data['message']='该邮箱已被注册';
					$this->load->view('home',$data);
            }
        }
     
    }		
}
?>
