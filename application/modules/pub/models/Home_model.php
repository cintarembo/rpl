<?php

class Home_model extends MY_Model
{
    public $table = 'tbl_transaksi';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * id_transaksi
     *
     * @param mixed $id_transaksi
     * @return void
     */
    public function id_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->from('tbl_detailtransaksi');
        $query = $this->db->get()->row();
        return $query->id;
    }

    /**
     * checkout
     *
     * @param mixed $no
     * @param mixed $id_transaksi
     * @param mixed $id_member
     * @param mixed $total_harga
     * @param mixed $id_film
     * @param mixed $tanggal
     * @param mixed $jam
     * @return void
     */
    public function checkout($no,$id_transaksi,$id_member,$total_harga,$id_film,$tanggal,$jam)
    {
        $jumlah = (count($no)/2)-1;
        $this->db->trans_start();
        $data = array(
            'id_transaksi'=> $id_transaksi,
            'id_member'=> $id_member,
            'total_harga'=>$total_harga
        );
        $this->db->insert('tbl_transaksi',$data);

        $detail = array(
            'id_transaksi' =>  $id_transaksi, 
            'id_film'=> $id_film,
            'tanggal'=> $tanggal,
            'jam'=>$jam,
            'studio'=>$this->input->get('studio'),
            'jumlah_beli'=> $jumlah,
            'harga'=>$total_harga
        );
        $this->db->insert('tbl_detailtransaksi',$detail);
        
        $id_detail = $this->id_transaksi($id_transaksi);
        for ($i=0; $i < $jumlah ; $i++) { 
            $this->db->insert('detail_kursi',[
                'id_detail'=>$id_detail,
                'no_kursi'=>$no[$i]
                ]);
        }
        $this->db->trans_complete();
    }
}