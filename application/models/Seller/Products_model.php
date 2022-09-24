<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    private $table = "product";
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'productId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'sellerId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'name' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'category' => array(
                'type' => 'VARCHAR',
                'constraint' =>50,
                ),
                'productPrice' => array(
                'type' => 'Decimal',
                'constraint' => '50,2',
                'default' => 0
                ),
                'pictureUrl' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'empty'
                ),
                'desc' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000,
                'default' => 'description'
                ),
                'date' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'date'
                ),
                'view' => array(
                'type' => 'INT',
                'constraint' => 100,
                'default' => 0
                ),
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('productId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    // save user to database
    public function addProduct($data = []){
        return $this->db->insert($this->table,$data);
    }
     //get table data
     public function getTableData(){
        return $this->db->select("*")->from($this->table)->where('sellerId',$this->session->userdata('userId'))->get()->result();
   }
   public function getProductDetails($id = ''){
        return $this->db->select("*")->from($this->table)->where('productId',$id)->get()->row();
   }
   public function editProduct($data = []){
        return $this->db->where('productId',$data['productId'])->update($this->table,$data); 
   }
   public function deleteProduct($id = ''){
        $this->db->where('productId',$id)->delete($this->table);
        if ($this->db->affected_rows()) {
            return true;
        } 
        else {
            return false;
        }
   }
}