<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
    private $table = "review";
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'revId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'userId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'referenceId' => array(
                'type' => 'VARCHAR',
                'constraint' =>20,
                ),
                'comment' => array(
                'type' => 'VARCHAR',
                'constraint' =>1000,
                ),
                'rating' => array(
                'type' => 'Decimal',
                'constraint' => '50,1',
                'default' => 0
                ),
                'date' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'date'
                ),
            ); 
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('revId', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }
    // save user to database
    public function addReview($data = []){
        return $this->db->insert($this->table,$data);
    }
    public function getReviews($id = ''){
        return $this->db->select('review.*,customer.fname,customer.lname,customer.pictureUrl')->from($this->table)->join('customer', 'review.userId = customer.customerId', 'left')->where('review.referenceId',$id)->order_by('review.date','DESC')->get()->result();
    }

   public function getProductDetails($id = ''){
        return $this->db->select("*")->from($this->table)->where('productId',$id)->get()->row();
   }
}