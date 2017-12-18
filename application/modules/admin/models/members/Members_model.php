<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends MY_Model{

    public $table        = 'tbl_member';
    public $primary_key  = 'id_member';
    public $protected    = array('id_member');
    public $timestamps   = FALSE;
    public $soft_deletes = FALSE;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
}