<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_search extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
	    $this->load->model('search_model');
	    $this->search_model->buildindex();
    }		
}