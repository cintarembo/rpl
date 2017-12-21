<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'admin/films/films_model'=> 'film',
            'admin/films/genre_model'=> 'genre',
            'admin/films/genrefilm_model'=>'gfm'
        ));
    }

    /**
     * render
     *
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

}