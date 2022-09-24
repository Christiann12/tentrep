<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddProduct extends CI_Controller {
	
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
		$data['userData'] = $this->Seller_model->getSellerDetail($this->session->userdata('userId'));
		if($this->checkUser()){
			$data['page'] = "AddProduct";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
	}
    public function editProduct($id = ''){
        $data['productData'] = $this->Products_model->getProductDetails($id);
        if(empty($data['productData'])): redirect('AddProduct'); endif;
		if($this->checkUser()){
			$data['page'] = "EditProduct";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
    }
    public function saveProduct(){
        $this->form_validation->set_rules('productName', 'Product Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
        $this->form_validation->set_rules('categoryField', 'Category' ,'required');
        $this->form_validation->set_rules('prodDesc', 'Product Description' ,'required');
        $this->form_validation->set_rules('prodPrice', 'Product Price' ,'required|callback_checkIfHasLetter');

        //load config for upload library
		$config['upload_path']   = APPPATH.'assets/images/productimage/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;

        $this->load->library('upload', $config);

        $name = 'attachment';

        $postData = array (
            'productId' => "PRDT-".$this->randStrGen(2,7),
            'sellerId' => $this->session->userdata('userId'),
            'name' => $this->input->post("productName"),
            'desc' => $this->input->post("prodDesc"),
            'category' => $this->input->post("categoryField"),
            'productPrice' => $this->input->post("prodPrice"),
            'date' => date('Y-m-d'),
        );

        if($this->form_validation->run() === true){
            if(!empty($_FILES['attachment']['name'])){
                //if upload fails abort process and display error
                if ( ! $this->upload->do_upload($name) ) {
                    $this->session->set_flashdata('failAddProduct',$this->upload->display_errors());
                } 
                //if upload success update the database with the correct filename
                else {
                    $upload =  $this->upload->data();
                    
                    $postData['pictureUrl'] = $upload['file_name'];

                    if($this->Products_model->addProduct($postData)){
                        $this->session->set_flashdata('successAddProduct','Add Success');
                        
                    }
                    else{
                        $this->session->set_flashdata('failAddProduct','Add Failed');
                    }
                }
            }
			else{
                if ($this->Products_model->addProduct($postData)){
                    $this->session->set_flashdata('successAddProduct','Add Success');

                }
                else{
                    $this->session->set_flashdata('failAddProduct','Add Failed');
                }
            }
            redirect('AddProduct');
        }
        else{
			$this->session->set_flashdata('failAddProduct',validation_errors());
            redirect('AddProduct');
        }
    }
    public function saveEdit(){
        $this->form_validation->set_rules('productName', 'Product Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
        $this->form_validation->set_rules('categoryField', 'Category' ,'required');
        $this->form_validation->set_rules('prodDesc', 'Product Description' ,'required');
        $this->form_validation->set_rules('prodPrice', 'Product Price' ,'required|callback_checkIfHasLetter');

        //load config for upload library
		$config['upload_path']   = APPPATH.'assets/images/productimage/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;

        $this->load->library('upload', $config);

        $name = 'attachment';

        $postData = array (
            'productId' => $this->input->post("productId"),
            'name' => $this->input->post("productName"),
            'desc' => $this->input->post("prodDesc"),
            'category' => $this->input->post("categoryField"),
            'productPrice' => $this->input->post("prodPrice"),
        );

        if($this->form_validation->run() === true){
            if(!empty($_FILES['attachment']['name'])){
                //if upload fails abort process and display error
                if ( ! $this->upload->do_upload($name) ) {
                    $this->session->set_flashdata('failAddProduct',$this->upload->display_errors());
                } 
                //if upload success update the database with the correct filename
                else {
                    $upload =  $this->upload->data();
                    
                    $postData['pictureUrl'] = $upload['file_name'];

                    if($this->Products_model->editProduct($postData)){
                        $this->session->set_flashdata('successEditProduct','Edit Success');
                        unlink(APPPATH.'assets/images/productimage/'.$this->input->post("filename"));
                    }
                    else{
                        $this->session->set_flashdata('failEditProduct','Edit Failed');
                    }
                }
            }
			else{
                if ($this->Products_model->editProduct($postData)){
                    $this->session->set_flashdata('successEditProduct','Edit Success');

                }
                else{
                    $this->session->set_flashdata('failEditProduct','Edit Failed');
                }
            }
            redirect('EditProduct/'.$this->input->post("productId"));
        }
        else{
			$this->session->set_flashdata('failEditProduct',validation_errors());
            redirect('EditProduct/'.$this->input->post("productId"));
        }
    }
    public function delete($id = ''){
        $data['productData'] = $this->Products_model->getProductDetails($id);
        if($this->Products_model->deleteProduct($id)){
			$this->session->set_flashdata('successAddProduct','Delete Success');
            unlink(APPPATH.'assets/images/productimage/'.$data['productData']->pictureUrl);
		}
		else{
			$this->session->set_flashdata('failAddProduct','Delete Failed');
		}
		
		redirect('AddProduct');
    }
    public function TableAjax(){
        $data1 = $this->Products_model->getTableData();
		
		// $productss = $this->inventory_model->productList();
		$json_data['data'] = $data1;
		echo json_encode($json_data);
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