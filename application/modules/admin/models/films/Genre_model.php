<?php 

class Genre_model extends MY_Model
{
    public $table        = 'tbl_genre';
    public $protected    = array('id_genre');
    public $primary_key  = 'id_genre';
    public $soft_deletes = FALSE;
    public $timestamps   = FALSE;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
