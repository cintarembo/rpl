<?php

class Member extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(
            array(
            'admin/films/genrefilm_model'=>'gfm',
            'admin/films/film_studio_model'=>'fsm',
            'admin/films/jam_tayang_model'=>'jtm'
            )
        );
    }
    
    /**
     * Render view
     * Sepert blade pada laravel.
     *
     * @param mixed $the_view
     * @param mixed $template='public'
     */
    protected function render($the_view = null, $template = 'public')
    {
        parent::render($the_view, $template);
    }

    public function bookedtickets()
    {
        $this->load->model(
            array(
                'admin/laporan/detail_laporan_m'  => 'detail_transaksi',
                'admin/laporan/laporan_m'         => 'transaksi'
            )
        );
        $this->data['transaksi'] = $this->transaksi
            ->with_detail(
                array(
                    'fields' => 'id_transaksi,tanggal',
                    'with'   => array(
                        'relation'  => 'film' ,
                        'fields'    => 'judul,mulai_tayang,selesai_tayang,durasi',
                    )
                )
            )
            ->where(
                'id_member',
                $this->ion_auth
                    ->user()
                    ->row()
                    ->id
            )
            ->get_all();
        $this->render('member/booked_tickets');
    }
}
