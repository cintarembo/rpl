<?php 

class Auth extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'=>'validation','ion_auth'=>'auth'));
        $this->validation->CI =& $this;
    }
    /**
     * render
     *
     * @param mixed $the_view
     * @param mixed $template='login'
     * @return void
     */
    protected function render($the_view = NULL,$template='login'){
        parent::render($the_view,$template);
    }

    /**
     * index
     *
     * @return void
     */
    public function index(){
        $this->render('index');
    }

    /**
     * login
     *
     * @return void
     */
    public function login(){
        if ($this->input->post()) {
            if ($this->validation->run('login')==TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $remember = (bool)$this->input->post('remember');
                if($this->ion_auth->login($username,$password,$remember)){
                    $data = array(
                        'status'    => TRUE,
                        'messages'  => $this->ion_auth->messages()
                    );
                    echo json_encode($data);
                }else{
                    $data = array(
                        'status'    => FALSE,
                        'messages'  => $this->ion_auth->errors()
                    );
                    echo json_encode($data);
                }
            }else{
                echo json_encode($this->validation->error_array());
            }
        }
    }

    /**
	 * Log the user out
	 */
	public function logout()
	{	
        $this->ion_auth->logout();
	}

    /**
     * register
     *
     * @return void
     */
    public function register(){
        if ($this->validation->run('register')==TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email    = $this->input->post('email');

            $data_tambahan = array(
                'first_name' => $this->input->post('nama-depan'),
                'last_name'  => $this->input->post('nama-belakang'),
                'address'    => $this->input->post('alamat'),
                'phone'      => $this->input->post('phone')
            );
            if($this->ion_auth->register($username,$password,$email,$data_tambahan))
            {
                $data = array(
                    'status'    => TRUE,
                    'messages'  => $this->ion_auth->messages()
                );
                echo json_encode($data);
            }else{
                $data = array(
                    'status'    => TRUE,
                    'messages'  => $this->ion_auth->errors()
                );
                echo json_encode($data);
            }
        }else{
            echo json_encode($this->validation->error_array());
        }
    }
}