<?php

class Member extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'admin/films/genrefilm_model'=>'gfm',
            'admin/films/film_studio_model'=>'fsm',
            'admin/films/jam_tayang_model'=>'jtm'
        ));
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
        
        $this->render('member/booked_tickets');
    }
}