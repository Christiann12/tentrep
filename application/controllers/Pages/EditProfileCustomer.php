<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfileCustomer extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->helper('url');
		$this->load->library('session');
		//model
		$this->load->model('Customer/Customer_model');
	}

	public function index()
	{
		$data['userData'] = $this->Customer_model->getCustomerDetail($this->session->userdata('userId'));
		if($this->checkUser()){
			$data['page'] = "EditProfileCustomer";
			$this->load->view('HeaderAndFooter/Header.php');
			$this->load->view('Pages/Wrapper.php',$data);
			$this->load->view('HeaderAndFooter/Footer.php');
		}
		else{
			redirect('Login');
		}
	}

    public function saveEdit(){
        $this->form_validation->set_rules('userFirstname', 'First Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
		$this->form_validation->set_rules('userLastname', 'Last Name' ,'required|callback_checkFieldIfHasNum|callback_checkFieldIfHasSP');
		if($this->input->post("userPassword") != ''){
            $this->form_validation->set_rules('userPassword', 'Password' ,'required');
		    $this->form_validation->set_rules('userRePassword', 'Confirm Password' ,'required|matches[userPassword]');
        }
        $this->form_validation->set_rules('region_group', 'Region' ,'required');
        $this->form_validation->set_rules('province_group', 'Province' ,'required');
        $this->form_validation->set_rules('muni_group', 'Municipality' ,'required');
        $this->form_validation->set_rules('barangay_group', 'Barangay' ,'required');

        //load config for upload library
		$config['upload_path']   = APPPATH.'assets/images/profilepic/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;

        $this->load->library('upload', $config);

        $name = 'attachment';

        $postData = array (
            'fname' => $this->input->post("userFirstname"),
            'lname' => $this->input->post("userLastname"),
            'region' => $this->input->post("region_group"),
            'province' => $this->input->post("province_group"),
            'municipality' => $this->input->post("muni_group"),
            'barangay' => $this->input->post("barangay_group"),
        );

        if($this->input->post("userPassword") != ''){
			$postData['password'] = md5($this->input->post("userPassword"));
		}

        if($this->form_validation->run() === true){
            if(!empty($_FILES['attachment']['name'])){
                //if upload fails abort process and display error
                if ( ! $this->upload->do_upload($name) ) {
                    $this->session->set_flashdata('failEditVet',$this->upload->display_errors());
                } 
                //if upload success update the database with the correct filename
                else {
                    $upload =  $this->upload->data();
                    
                    $postData['pictureUrl'] = $upload['file_name'];

                    if($this->Customer_model->editUser($postData,$this->session->userdata('userId'))){
                        $this->session->set_flashdata('successEditVet','Edit Success');
                        if($this->session->userdata('pictureUrl') != 'empty'){
                            unlink(APPPATH.'assets/images/profilepic/'.$this->session->userdata('pictureUrl'));
                        }
                        $this->session->set_userdata([
                            'isLogIn'     => true,
                            'firstName'     => $postData['fname'],
                            'lastName'  => $postData['lname'],
                            'pictureUrl'       => $upload['file_name'],
                        ]);
                    }
                    else{
                        $this->session->set_flashdata('failEditVet','Edit Failed');
                    }
                }
            }
			else{
                if ($this->Customer_model->editUser($postData,$this->session->userdata('userId'))){
                    $this->session->set_flashdata('successEditVet','Edit Success');
                    $this->session->set_userdata([
                        'isLogIn'     => true,
                        'firstName'     => $postData['fname'],
                        'lastName'  => $postData['lname'],
                    ]);
                }
                else{
                    $this->session->set_flashdata('failEditVet','Edit Failed');
                }
            }
            redirect('EditProfileCustomer');
        }
        else{
			$this->session->set_flashdata('failEditVet',validation_errors());
            redirect('EditProfileCustomer');
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
