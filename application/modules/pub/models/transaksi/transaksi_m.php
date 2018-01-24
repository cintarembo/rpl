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

    public function konfirmasi()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $bank = $this->input->post('bank');

        $config['upload_path'] = './public/uploads/original';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
        $config['max_size'] = 10000;
        $config['max_width'] = 4328;
        $config['max_height'] = 4328;
        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti');

        /* Resize images */
        $bukti = $this->upload->data('file_name');
        if ($this->upload->do_upload('bukti')) {
            $data = array(
                'nama' =>$nama ,
                'bank' =>$bank,
                'bukti'=>$bukti,
                'id_transaksi'=>$id
            );
            $this->db->insert('konfirmasi', $data);
            $status = array('sts' => true, );
        } else {
            echo json_encode($this->upload->display_errors());
        }
    }
}
