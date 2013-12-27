<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        header('Content-Type: text/html;charset=utf-8');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	public function index() {
	    $this->_load_home_view(
	        null,
	        $this->session->userdata('user_id'),
	        $this->session->userdata('user_type')
	    );
	}
	
	public function play($music_id) {
	    $this->_load_home_view(
	        $music_id,
	        $this->session->userdata('user_id'),
	        $this->session->userdata('user_type')
	    );
	}
	
	public function logout() {
	    $this->session->destroy();
	    redirect(base_url());
	}
	
	private function _load_home_view($music_id, $user_id, $user_type) {
	    //var_dump($this->_generate_data($music_id, 20, 0));
	    //die();
	    $this->load->view('home_view', $this->_generate_data(
	        $music_id,
	        $user_id,
	        $user_type
	    ));    
	}
	
	/* 生成传到 home view 的参数 */
	private function _generate_data($music_id, $user_id, $user_type) {
		$this->load->model('musician_model');
		$this->load->model('user_model');
		$this->load->model('music_model');
		
		// 获得音乐数据 $music
		if (!empty($music_id)) {
    		$music = $this->music_model->get_by_id($music_id);
		}
		else {
		    $music = $this->music_model->rand();
		}
		
		// 获得当前音乐的音乐人的信息 以及全部音乐
		$musician = $this->musician_model->check_id($music['musician_id']);
		$musician['all_music'] = $this->music_model->getallmusic_by_musician_id($music['musician_id']);
		
		// 获得用户数据 $user
		if (!empty($user_id)) {
		    // 如果要合并 user 和 musician 两张表，修改这里就好
		    if ($user_type == 1) { // 普通用户
		        $this->load->model('collect_model');
	            $this->load->model('follow_model');
                $this->load->model('copyright_model');
                $user = $this->user_model->get_exposable_row($user_id);
		    }
		    else { // 音乐人
		        $this->load->model('collectm_model', 'collect_model');
		        $this->load->model('followm_model', 'follow_model');
		        $this->load->model('copyrightm_model', 'copyright_model');
		        $user = $this->musician_model->get_exposable_row($user_id);
		    }
		    
		    // 往当前音乐 $music 中添加和用户有关的信息
		    $music['is_follow'] = $this->follow_model->is_follow($user_id, $music['musician_id']);
		    $music['is_collect'] = $this->collect_model->is_collect($user_id, $music['music_id']);
		    $music['is_copyright_sign'] = $this->copyright_model->is_copyright_sign($user_id, $music['music_id']);
		    
		    // 用户的收藏
		    $collection = $this->collect_model->display($user_id);
		}
		else {
		    $user = null;
		    // 往当前音乐 $music 中添加和用户有关的信息
		    $music['is_follow'] = false;
		    $music['is_collect'] = false;
		    $music['is_copyright_sign'] = false;
		    
		    // 用户的收藏
		    $collection = null;
		}
		
		
		// 这里就是选定的参数
		return array(
		    'music' => $music,            // 当前播放的音乐
		    'musician' => $musician,      // 当前播放的音乐的音乐人
		    'user' => $user,              // 当前登陆用户
		    'user_type' => $user_type,    // 当前登陆用户类型
		    'collection' => $collection // 当前用户的收藏
		);
	}
	
}
