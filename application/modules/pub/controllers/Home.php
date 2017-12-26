<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'admin/films/films_model'=> 'film',
            'admin/films/genre_model'=> 'genre',
            'admin/films/genrefilm_model'=>'gfm',
            'admin/films/studio_model'=>'studio'
        ));
    }

    /**
     * Render view 
     * Sepert blade pada laravel hehe
     * @param mixed $the_view
     * @param mixed $template='public'
     * @return void
     */
    protected function render($the_view = NULL,$template='public'){
        parent::render($the_view,$template);
    }

    public function index()
    {
        $this->data['film'] = $this->film->get_all();
        $this->render('home/index');
    }

    /**
     * view
     * Membuat view untuk single movie berdasarkan slug yang ada
     * @param mixed $slug
     * @return void
     */
    public function view($slug = NULL)
    {
        $this->data['film'] = $this->film->where('slug',$slug)->get();
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

    public function book2()
    {
        $this->data['film'] = $this->film->get_all();
        $this->render('book/step2');
    }

    public function book3()
    {
        $this->render('book/step3');
    }

    public function checkout()
    {
        $this->render('book/checkout');
    }

    public function login(){
        $this->render('auth/login');
    }

    public function register(){
        $this->render('auth/register');
    }

}