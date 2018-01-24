<?php
/**
 * Home
 */
class Home extends MY_Controller
{
    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(
            array(
            'admin/films/films_model' => 'film',
            'admin/films/genre_model' => 'genre',
            'admin/films/genrefilm_model' => 'gfm',
            'admin/films/studio_model' => 'studio',
            'admin/films/film_studio_model'=>'fsm',
            'admin/films/jam_tayang_model'=>'jtm',
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

    public function index()
    {
        $this->data['film'] = $this->film->get_all();
        $this->render('home/index');
    }

    /**
     * Movielist
     *
     * @return void
     */
    public function movielist()
    {
        $this->render('film/film-list');
    }
    
    /*
     * View
     * Membuat view untuk single movie berdasarkan slug yang ada.
     *
     * @return void
     */
    public function view($slug = null)
    {
        $film = $this->film->where('slug', $slug)->get();
        $id_film = $film->id_film;
        $this->data['film'] = $film;
        $this->data['studio'] = $this->fsm
            ->where('id_film', $id_film)
            ->with_studio()
            ->get_all();
        $this->data['jam'] = $this->jtm
            ->where('id_film', $id_film)
            ->with_jam()
            ->get_all();
        if (empty($this->data['film'])) {
            $this->render('error/404');
        } else {
            $this->render('film/single');
        }
    }

    public function book()
    {
        $this->data['film'] = $this->film->get_all();
        $this->render('book/step1');
    }

    public function timestudio()
    {
        $this->load->model('home_model', 'coreM');
        $film           = $this->film->where('judul', $this->input->get('f'))->get();
        $id_film        = $film->id_film;
        
        $data['studio'] = $this->fsm
            ->where('id_film', $id_film)
            ->with_studio()
            ->get_all();
        $data['jam'] = $this->jtm
            ->where('id_film', $id_film)
            ->with_jam()
            ->get_all();
        $this->load->view('film/timestudio', $data);
    }

    public function book2()
    {
        $this->render('book/step2');
    }

    public function purchase()
    {
        if ($this->input->get()) {
            $this->load->model('home_model', 'coreM');
            $id_member      = $this->ion_auth->user()->row()->id;
            $film           = $this->film
                ->where('judul', $this->input->get('fillm'))
                ->get();
            $id_film        = $film->id_film;
            $total_harga    = $this->input->get('total_harga');
            $tanggal        = $this->input->get('tanggal');
            $jam            = $this->input->get('jam');
            $no = explode(',', $this->input->get('nomor_kursi'));
            $id_transaksi   = $this->randomString();
            $this->coreM->checkout(
                $no,
                $id_transaksi,
                $id_member,
                $total_harga,
                $id_film,
                $tanggal,
                $jam
            );
        } else {
            redirect('pub/home');
        }
    }

    public function checkout()
    {
        $this->load->model('transaksi/transaksi_m', 'transaksi');
        $id_transaksi = $this->input->get('t');
        $this->data['transaksi'] = $this->transaksi
            ->where('id_transaksi', $id_transaksi)
            ->get();
        $this->render('book/checkout');
    }

    public function pay()
    {
        if ($this->input->get()) {
            $this->render('book/pay');
        } else {
            $this->render('book/pay');
        }
    }

    public function pay_upload()
    {
        $this->load->model('transaksi/transaksi_m', 'transaksi');
        $this->transaksi->konfirmasi();
    }

    public function success()
    {
        $this->load->model(
            array(
            'transaksi/transaksi_m'=>'transaksi',
            'transaksi/dtransaksi_m'=>'dtransaksi',
            'transaksi/kursi_m'=>'kursi',
            'home_model'=> 'coreM'
            )
        );

        $id_transaksi = $this->input->get('t');
        $this->data['transaksi'] = $this->dtransaksi
            ->where('id_transaksi', $id_transaksi)
            ->with_transaksi()
            ->with_film()
            ->with_studio()
            ->get();
        $id_trans = $this->coreM->id_transaksi($id_transaksi);
        $this->data['kursi'] = $this->kursi
            ->where('id_detail', $id_trans)
            ->get_all();
        $this->render('book/success');
    }

    public function login()
    {
        $this->render('auth/login');
    }

    public function register()
    {
        $this->render('auth/register');
    }

    public function randomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return strtoupper($str);
    }
}
