<?php

class Jam_tayang_model extends MY_Model
{
    public $table = 'jam_tayang';
    public $protected = ['id'];

    public function __construct()
    {
        $this->has_many['jam'] = array('foreign_model' => 'jam_model', 'foreign_table' => 'jam', 'foreign_key' => 'id', 'local_key' => 'id_jam');
        parent::__construct();
    }
}
