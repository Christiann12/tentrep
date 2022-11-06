<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Seller/Seller_model');
        $this->load->model('Seller/Products_model');
	}

	public function index()
	{
		// $data['userData'] = $this->Seller_model->getSellerDetail($this->session->userdata('userId'));
        $this->load->library('Pagination_bootstrap');
        $links = array(
            'next' => 'Next',
            'prev' => 'Previous',
            'last' => 'Last',
            'first' => 'First',
        );
        $this->pagination_bootstrap->set_links($links);
        // $productData = $this->db->select('*')->where('clinicName !=','clinic name')->where('desc !=','description')->where('address !=','address')->where('region !=','region')->where('municipality !=','municipality')->where('province !=','province')->where('barangay !=','barangay')->get('vet');
        $productData = $this->db->get('product');
        $productData = $this->db->select('product.* ,avg(review.rating) as averageRating ')->from('product')->join('review', 'product.productId = review.referenceId', 'left')->group_by('product.productId')->get();
        $this->pagination_bootstrap->offset(16);
        $data['counter'] = 0;
        $data['result'] = $this->pagination_bootstrap->config("/Products/", $productData);
		if($this->checkUser()){
			$data['page'] = "Products";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
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