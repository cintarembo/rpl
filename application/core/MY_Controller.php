<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."third_party/MX/Controller.php";
class MY_Controller extends MX_Controller {

    protected $data = array();
    function __construct()
    {   
        $this->load->add_package_path(APPPATH.'third_party/ion_auth/');
        $this->load->library('ion_auth');
        parent::__construct();
    }

    protected function render($the_view = NULL,$template='admin')
    {
        if(is_null($template))
        {
            $this->load->view($the_view,$this->data);
        }
        else
        {
            $this->data['content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
            $this->load->view($template.'_view', $this->data);
        }
    }

    public function number($string)
    {
        $a = preg_replace('/[^0-9]/','',$string);
        return $a; 
    }
}