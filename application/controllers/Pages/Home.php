<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Customer/Customer_model');
		$this->load->model('Seller/Products_model');
		$this->load->model('Vet/Vet_model');
	}

	public function index()
	{
		$data['userData'] = $this->Customer_model->getCustomerDetail($this->session->userdata('userId'));
		$data['recommendedProducts'] = $this->Products_model->getRecommended();
		$data['recommendedClinics'] = $this->Vet_model->getRecommended($this->session->userdata('userId'));
		if($this->checkUser()){
			$data['page'] = "Home";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
	}
	public function checkUser(){
		if(empty($this->session->userdata('isLogIn'))){
			return false;
		}
		else if(empty($this->session->userdata('userRole')) || $this->session->userdata('userRole') != 'customer'){
			return false;
		}
		else if(empty($this->session->userdata('userId'))){
			return false;
		}
		else if(empty($this->session->userdata('firstName'))){
			return false;
		}
		else if(empty($this->session->userdata('lastName'))){
			return false;
		}
		else if(empty($this->session->userdata('userName'))){
			return false;
		}
		else if(empty($this->session->userdata('pictureUrl'))){
			return false;
		}
		return true;
	}
}
