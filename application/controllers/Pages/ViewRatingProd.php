<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewRatingProd extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Vet/Vet_model');
		$this->load->model('Review/Review_model');
	}

	public function index()
	{
		// $data['userData'] = $this->Seller_model->getSellerDetail($this->session->userdata('userId'));
        // $data['reviews'] = $this->Review_model->getReviews($this->session->userdata('userId'));
		if($this->checkUser()){
			$data['page'] = "ViewRatingProd";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
	}
	public function viewRating($id){
		 $data['reviews'] = $this->Review_model->getReviews($id);
		if($this->checkUser()){
			$data['page'] = "ViewRatingProdSpec";
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
		else if(empty($this->session->userdata('userRole')) || $this->session->userdata('userRole') != 'seller'){
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
        else if(empty($this->session->userdata('storepicture'))){
			return false;
		}
		return true;
	}
}
