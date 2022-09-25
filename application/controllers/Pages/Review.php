<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Vet/Vet_model');
		$this->load->model('Seller/Seller_model');
        $this->load->model('Seller/Products_model');
        $this->load->model('Review/Review_model');
	}

	public function reviewVet($id = '')
	{
        $data['vetData'] = $this->Vet_model->getVetDetail($id);
        
		if($this->checkUser()){
			$data['page'] = "Review";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
	}
    public function saveReview(){
        $this->form_validation->set_rules('comment', 'Comment' ,'required|max_length[1000]');

        $postData = array (
            "revId" => "RVVW-".$this->randStrGen(2,7),
            'referenceId' => $this->input->post("vetId"),
            'userId' => $this->session->userdata('userId'),
            'rating' => empty($this->input->post("rating")) ? 0 : $this->input->post("rating"),
            'comment' => $this->input->post("comment"),
            'date' => date('Y-m-d')
        );

        if($this->form_validation->run() === true){
            if ($this->Review_model->addReview($postData)){
                $this->session->set_flashdata('successReview','Edit Success');
            }
            else{
                $this->session->set_flashdata('failReview','Edit Failed');
            }
            redirect('ClinicProfile/'.$this->input->post("vetId"));
        }
        else{
			$this->session->set_flashdata('failReview',validation_errors());
            redirect('ReviewVet/'.$this->input->post("vetId"));
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
    public function checkIfHasLetter($text = ''){
        for ($i = 0; $i < strlen($text); $i++){
            $char = $text[$i];
            if (is_numeric($char)) {
                return true;
            } else {
                $this->form_validation->set_message('checkIfHasLetter', 'The {field} has letter!');
                return false;
            }
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