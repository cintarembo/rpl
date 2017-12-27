<?php

class Jam_model extends MY_Model
{
    public $table = 'jam';
    public $protected = ['id'];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
