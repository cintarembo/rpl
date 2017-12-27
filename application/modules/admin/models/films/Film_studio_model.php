<?php

class Film_studio_model extends MY_Model
{
    public $table = 'film_studio';
    public $protected = ['id'];

    public function __construct()
    {
        $this->has_many['studio'] = array('foreign_model' => 'studio_model', 'foreign_table' => 'studio', 'foreign_key' => 'id', 'local_key' => 'id_studio');
        parent::__construct();
    }
}
