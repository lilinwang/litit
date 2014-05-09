<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsong extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function index(){
			$data['userid']= $this->session->userdata('userid');
            $this->load->view('newsong',$data);
	}
	
}

?>
