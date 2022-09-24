<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationSeller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Seller/Seller_model');
	}
	public function index()
	{
		$this->load->view('Common/RegistrationSeller');
	}

	public function saveUser(){
		$this->form_validation->set_rules('userFirstname', 'First Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
		$this->form_validation->set_rules('userLastname', 'Last Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
		$this->form_validation->set_rules('userName', 'User Name' ,'required|callback_username_check');
		$this->form_validation->set_rules('userPassword', 'Password' ,'required');
		$this->form_validation->set_rules('userRePassword', 'Confirm Password' ,'required|matches[userPassword]');

		$postData = array(
            "sellerId" => "SLLR-".$this->randStrGen(2,7),
            "fname" => ucfirst(strtolower($this->input->post("userFirstname"))),
            "lname" => ucfirst(strtolower($this->input->post("userLastname"))),
            "password" => md5($this->input->post("userPassword")),
            "userName" => $this->input->post("userName"),
        );

		if($this->form_validation->run() === true){
			if ($this->Seller_model->addUser($postData)){
				$this->session->set_flashdata('successSellerCreate','Add Success');
			}
			else{
				$this->session->set_flashdata('errorSellerCreate','Add Failed');
			}
            redirect('RegistrationSeller');
        }
        else{
			$this->session->set_flashdata('errorSellerCreate',validation_errors());
            redirect('RegistrationSeller');
        }
	}

	// ---------------------------------------------CUSTOM FUNCTIONS---------------------------------------------
	public function username_check($userName){
		$userNameCountVet = $this->db->select('userName')->where('userName',$userName)->get('vet')->num_rows();
		$userNameCountCustomer = $this->db->select('userName')->where('userName',$userName)->get('customer')->num_rows();
		$userNameCountSeller = $this->db->select('userName')->where('userName',$userName)->get('seller')->num_rows();
		if ($userNameCountVet > 0 || $userNameCountCustomer > 0 || $userNameCountSeller > 0  ) {
			$this->form_validation->set_message('username_check', 'The {field} already exists!');
			return false;
		} else {
			return true;
		}
	}
	public function randStrGen($mode = null, $len = null){
		$result = "";
		if($mode == 1):
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		elseif($mode == 2):
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		elseif($mode == 3):
			$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		elseif($mode == 4):
			$chars = "0123456789";
		endif;

		$charArray = str_split($chars);
		for($i = 0; $i <= $len; $i++) {
				$randItem = array_rand($charArray);
				$result .="".$charArray[$randItem];
		}
		return $result;
	}
	public function checkFieldIfHasNum($text = ''){
		if( preg_match('~[0-9]+~', $text)){
			$this->form_validation->set_message('checkFieldIfHasNum', 'The {field} has numeric value!');
			return false;
		}
		else{
			return true;
		}
	}
	public function checkFieldIfHasSP($text = ''){
		if( preg_match('/[\'^£$%&*(!)}+{@#~?><>\[\],|=_¬-]/', $text)){
			$this->form_validation->set_message('checkFieldIfHasSP', 'The {field} has special character!');
			return false;
		}
		else{
			return true;
		}
	}
}
