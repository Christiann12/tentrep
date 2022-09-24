<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    private $table = "customer";
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'customerId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'fname' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'lname' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'password' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'userName' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => TRUE
                ),
                'userRole' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'customer'
                ),
                'region' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'region'
                ),
                'province' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'province'
                ),
                'municipality' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'municipality'
                ),
                'barangay' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'barangay'
                ),
                'pictureUrl' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'empty'
                ),
                
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('customerId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    // save user to database
    public function addUser($data = []){
        return $this->db->insert($this->table,$data);
    }
    public function checkCredentials($data = []){
        return $this->db->select("*")
        ->from($this->table)
        ->where('userName',$data['userName'])
        ->where('password',$data['password'])
        ->get()
        ->row();
    }
    public function getCustomerDetail($id = ''){
        return $this->db->select('*')->from($this->table)->where('customerId',$id)->get()->row();
    }
    public function editUser($data = [],$id = ''){
        return $this->db->where('customerId',$id)->update($this->table,$data); 
    }
}