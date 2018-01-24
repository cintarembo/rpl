<?php

class Detail_Kursi_M extends MY_Model
{
    public $table = 'detail_kursi';

    public function __construct()
    {
        $this->has_one['detail'] = array(
            'foreign_model' => 'laporan/detail_laporan_m',
            'foreign_table' => 'tbl_detailtransaksi',
            'foreign_key' => 'id',
            'local_key' => 'id_detail'
        );
        parent::__construct();
        $this->load->database();
    }
}
