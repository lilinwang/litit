<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function index()
    {
        exit('Access denied');
    }
    
    public function collect_music() { 
        $this->load->library('session');
    
        $user_id = $this->session->userdata('user_id');
        $music_id = $this->input->post("music_id");
        $action = $this->input->post("action");
        
        $this->load->model('collect_model');
        
        if($action == "add") {
            $errno = $this->collect_model->add_collect($user_id, $music_id);
            if($errno == 0) {
                echo '{"errno":0, "msg":"收藏成功"}';
            }
            else if($errno == 1){
                echo '{"errno":1, "msg":"已经收藏过该音乐"}';
            }
            else if($errno < 0) {
                echo '{"errno":' . $errno . ', "msg":"收藏失败"}';
            }
        }
        else if ($action == "delete"){
            $errno = $this->collect_model->delete_collect($user_id, $music_id);
            if($errno == 0) {
                echo '{"errno":0, "msg":"取消收藏成功"}';
            }
            else if($errno == 1){
                echo '{"errno":1, "msg":"已经取消收藏该音乐"}';
            }
            else if($errno < 0) {
                echo '{"errno":' . $errno . ', "msg":"取消收藏失败"}';
            }
        }
    }
    
    public function follow() {
        $this->load->library('session');
    
        $user_id = $this->session->userdata('user_id');
        $musician_id = $this->input->post("musician_id");
        $action = $this->input->post("action");
        
        $this->load->model('follow_model');
        if($action == "add") {
            $errno = $this->follow_model->add_follow($user_id, $musician_id);
            if($errno == 0) {    
                echo '{"errno":0, "msg":"关注成功"}';
            }
            else if($errno == 1){
                echo '{"errno":1, "msg":"已经关注了该音乐人"}';
            }
            else if($errno < 0) {
                echo '{"errno":' . $errno . ', "msg":"关注失败"}';
            }
        }
        else if ($action == "delete"){
            $errno = $this->follow_model->delete_follow($user_id, $musician_id);
            if($errno == 0) {
                echo '{"errno":0, "msg":"取消关注成功"}';
            }
            else if($errno == 1){
                echo '{"errno":1, "msg":"已经取消关注了该音乐人"}';
            }
            else if($errno < 0) {
                echo '{"errno":' . $errno . ', "msg":"取消关注失败"}';
            }
        }
    }
    
    /*
        随机返回10首歌
        希望以后能有筛选条件
    */
    public function fetch_radio_music() 
    {
        $this->load->model('music_model');
    	$data = $this->music_model->rand_return_only_ids(10); // return 10 music_ids randomly
        echo json_encode($data);
    }
      
    public function fetch_music_info() {
        $this->load->model('music_model');
        $this->load->model('user_model');
        $this->load->model('musician_model');
        $this->load->library('session');
        
        $user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata('user_type');
        $music_id = $this->input->post("music_id");
        
        $this->load->model('collect_model');
        $this->load->model('follow_model');
        
        $user = $this->user_model->get_exposable_row($user_id);
        $music = $this->music_model->get_by_id($music_id);
        
    	$music['musician'] = $this->musician_model->get_by_id($music['musician_id']);
    	$music['musician']['all_music'] = $this->music_model->get_all_music_by_musician_id($music['musician_id']);
    	$music['is_follow'] = $this->follow_model->is_follow($user_id, $music['musician_id']);
    	$music['is_collect'] = $this->collect_model->is_collect($user_id, $music['music_id']);
        
        echo json_encode($music);
    }  
    
    public function search() {
        $keyword = $this->input->post('keyword');
        $this->load->model('search_model');
        $result = $this->search_model->search(array($keyword));
        echo json_encode($result);
    }
}
