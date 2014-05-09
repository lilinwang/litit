<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
    	// no direct access to the ajax controller
    	header('Location:'. base_url());
    }

    public function do_upload_image() {
        $this->load->library('uploadhandler', 
        	array(
        		'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
        		'script_url' => base_url().'upload_ajax/do_upload_image', // equals to this class, this method
        		'upload_url' => 'upload/tmp/', // both of upload_url, upload_dir equals to the upload destination
        		'upload_dir' => 'upload/tmp/',
        		'max_file_size' => 1024*1024*2 // in byte
        	)
        );
    }
    
    public function do_upload_music() {
    	$this->load->library('uploadhandler', 
        	array(
        		'accept_file_types' => '/\.(mp3|wav|wma|flac)$/i',
        		'script_url' => base_url().'upload_ajax/do_upload_music', // equals to this class, this method
        		'upload_url' => 'upload/tmp/', // both of upload_url, upload_dir equals to the upload destination
        		'upload_dir' => 'upload/tmp/',
        		'max_file_size' => 1024*1024*50 // in byte
        	)
        );
    }
}
