<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model(array(
            'members/Members_model'=>'members'
        ));
    }    

    public function index(){
        $this->data['member'] = $this->members->get_all();
        $this->render('member/index');
    }
}
