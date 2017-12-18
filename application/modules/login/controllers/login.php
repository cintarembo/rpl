<?php 

class Login extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'=>'validation'));
        $this->validation->CI =& $this;

    }
    protected function render($the_view = NULL,$template='login'){
        parent::render($the_view,$template);
    }
    public function index(){
        $this->render('login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->check_login($username,$password);
    }

    private function check_login($username,$password){
        $this->load->model('admin/members/members/model','member');
        $member = $this->member->where('username',$username)->where('password',$password)->get();
        //if member,password ada di tabel member = TRUE
        if ($member>0) {
            print_r('oke');
        }else{
            print_r('jahat');
        }

    }
}