<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Load Third Party Application */
$this->load->add_package_path(array(
    'APPPATH."third_party/ion_auth/"',
    'APPPATH."third_party/MX/Controller.php"'
));
class MY_Controller extends MX_Controller {

    protected $data = array();
    function __construct()
    {
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
}