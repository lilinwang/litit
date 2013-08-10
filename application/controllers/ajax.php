<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function index()
    {
        exit('Access denied');
    }
    
    function getmusic()
    {
		$this->load->model('music_model');
        $this->load->model('musician_model');
		$data=$this->music_model->rand();
        $data['musician'] = $this->musician_model->check_id($data['musician_id']);
		$data['list']= $this->music_model->getallmusic_by_musician_id($data['musician_id']);
		$data['tag']=$this->music_model->gettag_by_id($data['music_id']);
		echo json_encode($data);
    }
    function likemusic()
    {
		$this->load->model('music_model');
        $this->load->model('musician_model');
    	$this->music_model->collect_inc($_POST['musician_id'],$_POST['music_id'],$_POST['user_id']);	
    }
    function no_likemusic()
    {
		$this->load->model('music_model');
        $this->load->model('musician_model');
    	$this->music_model->collect_dec($_POST['musician_id'],$_POST['music_id'],$_POST['user_id']);	
    }
    function attention_musician()
    {
    	$this->load->model('music_model');
        $this->load->model('musician_model');
    	$data=$this->musician_model->attention_inc($_POST['musician_id'],$_POST['music_id'],$_POST['user_id']);
        echo $data;
    }
    function no_attention_musician()
    {
    	$this->load->model('music_model');
        $this->load->model('musician_model');
    	$data=$this->musician_model->attention_dec($_POST['musician_id'],$_POST['music_id'],$_POST['user_id']);
        echo $data;
    }
    function islike_follow()
    {
    	$this->load->model('collect_model');
        $this->load->model('follow_model');
       	$data['follow']=$this->follow_model->is_follow($_POST['user_id'],$_POST['musician_id']);
        $data['collect']=$this->collect_model->is_collect($_POST['user_id'],$_POST['music_id']);
        echo json_encode($data);
    }
}

