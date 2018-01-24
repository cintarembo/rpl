<?php

class Detail_Laporan_M extends MY_Model
{
    public $table = 'tbl_detailtransaksi';
    

    public function __construct()
    {
        $this->has_one['transaksi'] = array(
            'foreign_model' => 'laporan_m',
            'foreign_table' => 'tbl_transaksi',
            'foreign_key'   => 'id_transaksi',
            'local_key'     => 'id_transaksi'
        );
        $this->has_one['film'] = array('foreign_model' => 'films/films_model', 'foreign_table' => 'tbl_film', 'foreign_key' => 'id_film', 'local_key' => 'id_film');
        parent::__construct();
        $this->load->database();
    }
}
