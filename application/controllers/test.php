<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test(){
		echo $this->input->post('storeName');
	}
}
