
<?php

class Konfirmasi_m extends MY_Model
{
    public $table = 'konfirmasi';
    public function __construct()
    {
        $this->has_one['transaksi'] = array('foreign_model' => 'laporan_m', 'foreign_table' => 'tbl_transaksi', 'foreign_key' => 'id_transaksi', 'local_key' => 'id_transaksi');
        parent::__construct();
        $this->load->database();
    }
}
