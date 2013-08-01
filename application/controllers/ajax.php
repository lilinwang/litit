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
}

