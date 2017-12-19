<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $this->render('home/index');
    }

}