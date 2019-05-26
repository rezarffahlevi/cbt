<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_main');

	}
	public function index()
	{

		$this->load->library('parser');
		$where = array('SchoolCode' => 'B0192');
		$identity=$this->M_main->identity($where)->result_array();
		$token = $this->random(12);
		$data = array('identity' => $identity, 'base_url' => base_url(), 'site_url' => site_url(), 'token' => $token, 'mess' => $this->session->flashdata('mess'), 'user' => $this->session->flashdata('user'));

		$this->parser->parse('login', $data);
	}
	public function validate(){
		if(!isset($_POST['Username']) || !isset($_POST['Password'])){
			redirect('main/login/');
		}
		$user=htmlspecialchars($_POST['Username']);
		$pass=md5(sha1($_POST['Password'],1));
		$token=htmlspecialchars($_POST['Token']);
		$check=$this->M_main->get_id('sysuser', array('Username' => $user));
		if($check->num_rows() == 1){
			if($pass == $check->row('Password')){
				$this->auth->do_login($user, $pass);
				$this->M_main->success("<b>Selamat datang ".$this->session->userdata('Name')."</b>");
				redirect('main/admin/');
			}
			else{
				$this->session->set_flashdata('user', $user);
				$this->M_main->wrong("<b>Password tidak sesuai</b>");
				redirect('main/login/');
			}
		}
		else{
			$this->M_main->wrong("<b>Username anda tidak ditemukan</b>");
			redirect('main/login/');
		}
	}
	public function logout(){
		$this->auth->do_logout();
		redirect('main/login/');
	}
	public function random($long){
	   $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	   $string = '';
	   for($i = 0; $i < $long; $i++) {
	   $post = rand(0, strlen($char)-1);
	   $string .= $char{$post};
	   }
	    return $string;
	}
}
