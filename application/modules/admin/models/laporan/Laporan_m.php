<?php

class Laporan_m extends MY_Model
{
    public $table = 'tbl_transaksi';
    public $primary_key = 'id_transaksi';
    public $protected    = array('id_member','id_transaksi');
    public $timestamps   = false;
    public $soft_deletes = false;

    /**
     * __construct
     *
     * @return mixed void
     */
    public function __construct()
    {
        $this->has_one['member'] = array('foreign_model' => 'members/members_model', 'foreign_table' => 'users', 'foreign_key' => 'id', 'local_key' => 'id_member');
        $this->has_one['detail'] = array('foreign_model' => 'laporan/detail_laporan_m', 'foreign_table' => 'tbl_detailtransaksi', 'foreign_key' => 'id_transaksi', 'local_key' => 'id_transaksi');
        $this->has_one['konfirmasi'] = array('foreign_model' => 'laporan/konfirmasi_m', 'foreign_table' => 'konfirmasi', 'foreign_key' => 'id_transaksi', 'local_key' => 'id_transaksi');
        parent::__construct();
        $this->load->database();
    }
}
