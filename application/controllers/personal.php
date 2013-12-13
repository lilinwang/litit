<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        if(!$this->session->userdata('is_logged_in')){
            redirect(base_url('home'));
        }
    }
    
    public function index() {
        $this->load->model('user_model');
        $this->load->model('musician_model');
        $user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata('user_type');
        
        $this->load->view('personal_view', $this->_generate_data($user_id, $user_type));
    }
    
    
    /*
     * 生成传到view的数据
     * 只生成collect和user，其他使用ajax传送数据
     */
    private function _generate_data($user_id, $user_type) {
        $data = array();
        $data['user_id'] = $user_id;
        $data['user_type'] = $user_type;
        
        // 如果要合并user和musician两张表中的部分数据，那么就只需要修改下面这段条件语句
        if($user_type == '1') { // normal user
            $this->load->model('collect_model');
            /*$this->load->model('follow_model');
            $this->load->model('download_model');
            $this->load->model('copyright_model');
            $this->load->model('private_letter_model');
            */
            $data['user'] = $this->user_model->get_exposable_row($user_id);
        }
        else { // musician
            // 使用和普通用户相同的model名称
            $this->load->model('collectm_model', 'collect_model');
            /*$this->load->model('followm_model', 'follow_model');
            $this->load->model('downloadm_model', 'download_model');
            $this->load->model('copyrightm_model', 'copyright_model');
            $this->load->model('privatem_letter_model', 'private_letter_model');
            */
            $data['user'] = $this->musician_model->get_exposable_row($user_id);
            // 普通用户没有的model
            /*$this->load->model('upload_model');    
            $data['uploads'] = $this->upload_model->display($user_id);
            */
        }
        
        $data['collects']=$this->collect_model->display($user_id);
        /*$data['follows']=$this->follow_model->display($user_id);
        $data['downloads']=$this->download_model->display($user_id);
        $data['copyrights']=$this->copyright_model->display($user_id);
        $data['private_letters']=$this->private_letter_model->display($user_id);
        */
        return $data;
    }
}
