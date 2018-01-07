<?php

class Transaksi_m extends MY_Model
{
    public $table='tbl_transaksi';
    public $protected = ['id'];
    public $primary_key = 'id_transaksi';

    public function __construct()
    {
        parent::__construct();
    }
}