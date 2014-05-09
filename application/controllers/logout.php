<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
		parent::__construct();
		header('Content-Type: text/html;charset=utf-8');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
        }
	
	function index() {
		$this->session->sess_destroy();
		redirect(base_url('home'));
        //echo ($a[0]['musicianid']);
        //print_r ($this->musician_model->check_id($id));
	}	
}
?>