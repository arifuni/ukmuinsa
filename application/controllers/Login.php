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

          $username=$this->input->post('niknim');
          $password=$this->input->post('password');

          $data = file_get_contents('http://eis.uinsby.ac.id/eis/login/'.$username.'/'.$password);
          $a=explode('"',$data);
          if(empty($a[3])){$a[3]="a";}
          if ($a[3]==$username){redirect('welcome');}
          else{redirect('');}


	}

}
