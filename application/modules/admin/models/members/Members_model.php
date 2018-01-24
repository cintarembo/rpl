<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Members_model extends MY_Model
{

    public $table        = 'users';
    public $primary_key  = 'id';
    public $protected    = array('id');
    public $timestamps   = false;
    public $soft_deletes = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
