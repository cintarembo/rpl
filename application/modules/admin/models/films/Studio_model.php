<?php 

class Studio_model extends MY_Model
{
    public $table='studio';
    public $protected = array('id');
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}