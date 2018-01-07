<?php 

class Kursi_m extends MY_Model
{
    public $table='detail_kursi';
    public $protected = array('id');

    public function __construct()
    {
        $this->has_many['dtransaksi'] = array('foreign_model' => 'dtransaksi_m', 'foreign_table' => 'tbl_detailtransaksi', 'foreign_key' => 'id', 'local_key' => 'id_detail');
        parent::__construct();
    }
}