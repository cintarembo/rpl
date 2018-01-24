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
        $this->has_one['film'] = array(
            'foreign_model' => 'admin/films/films_model',
            'foreign_table' => 'tbl_film',
            'foreign_key'   => 'id_film',
            'local_key'     => 'id_film'
        );

        $this->has_many['kursi'] = array(
            'foreign_model' => 'laporan/detail_kursi_m',
            'foreign_table' => 'detail_kursi',
            'foreign_key'   => 'id_detail',
            'local_key'     => 'id'
        );
        parent::__construct();
        $this->load->database();
    }
}
