<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->library('ci_pusher');
    }
	public function index()
	{
		if(isset($_SESSION['email'])){
			redirect('chat');
		}
		$this->load->view('login');

	}
	public function register(){
		$username = $this->input->post('username');
		$niknim 	  = $this->input->post('niknim');
		$password = $this->input->post('password');
		$data = array(
			'niknim'    => $niknim,
			'pass' => password_hash($password, PASSWORD_DEFAULT)
		);

		$this->chat_model->add_user($data);
		redirect(base_url().'login');
	}
	public function login_submit(){

	 	$logged = $this->chat_model->login();

        if( $logged == 1 ){
            redirect('welcome');

        }else{
            redirect('');
        }
	}

}
