<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Customer/Customer_model');
		$this->load->model('Seller/Seller_model');
		$this->load->model('Vet/Vet_model');
	}

	public function index()
	{
		$this->load->view('Common/Login');
	}
	public function checkUser(){
		$this->form_validation->set_rules('userNameLogin', 'User Name' ,'required');
		$this->form_validation->set_rules('passwordLogin', 'Password' ,'required');

		$postData = array(
			'password' => md5($this->input->post('passwordLogin')),
            'userName' => $this->input->post('userNameLogin'),
		);

		if($this->form_validation->run() === true){
			$customerData = $this->Customer_model->checkCredentials($postData);
			$sellerData = $this->Seller_model->checkCredentials($postData);
			$vetData = $this->Vet_model->checkCredentials($postData);
			if(!empty($customerData) || !empty($sellerData) || !empty($vetData)){
				$this->session->set_flashdata('successLogin','Login Successful');

				if(!empty($customerData)){
					$this->session->set_userdata([
						'isLogIn'     => true,
						'userRole'     => $customerData->userRole,
						'userId'     => $customerData->customerId,
						'firstName'     => $customerData->fname,
						'lastName'  => $customerData->lname,
						'userName'       => $customerData->userName,
						'pictureUrl'       => $customerData->pictureUrl,
					]);
				}
				else if(!empty($sellerData)){
					$this->session->set_userdata([
						'isLogIn'     => true,
						'userRole'     => $sellerData->userRole,
						'userId'     => $sellerData->sellerId,
						'firstName'     => $sellerData->fname,
						'lastName'  => $sellerData->lname,
						'userName'       => $sellerData->userName,
						'pictureUrl'       => $sellerData->pictureUrl,
						'storepicture'       => $sellerData->storepicture,
					]);
				}
				else if(!empty($vetData)){
					$this->session->set_userdata([
						'isLogIn'     => true,
						'userRole'     => $vetData->userRole,
						'userId'     => $vetData->vetId,
						'firstName'     => $vetData->fname,
						'lastName'  => $vetData->lname,
						'userName'       => $vetData->userName,
						'pictureUrl'       => $vetData->pictureUrl,
						'clinicpicture'       => $vetData->clinicpicture,
					]);
				}
				
				

				if (strtolower($this->session->userdata('userRole'))== "customer" ) { redirect('Home'); }
				else if (strtolower($this->session->userdata('userRole'))  == "vet" ) { redirect('ProfileVet'); }
				else if (strtolower($this->session->userdata('userRole')) == "seller") { redirect('ProfileSeller'); }
			}
			else{
				$this->session->set_flashdata('errorLogin','Incorrect Email or Password');
				redirect('Login');
			}
		}
		else{
			$this->session->set_flashdata('errorLogin',validation_errors());
			redirect('Login');
		}
	}
	public function signout(){

		$array_items = array('isLogIn', 'userId', 'firstName', 'lastName', 'userName','userRole');
		$this->session->unset_userdata($array_items);
		redirect('Login');
		
	}
}
