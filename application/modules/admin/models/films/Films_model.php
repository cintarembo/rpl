<?php 

class Films_model extends MY_Model
{
    public $table='tbl_film';
    public $primary_key='id_film';
    public $protected=array('id_film');
    public $soft_deletes=FALSE;
    public $timestamps=FALSE;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}