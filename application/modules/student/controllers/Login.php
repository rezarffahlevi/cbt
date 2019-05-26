<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_student');
	}
	public function index()
	{
		$where = array('SchoolCode' => 'B0192');
		$data['identity'] = $this->M_student->identity($where)->row();
		$data['content'] = 'login';
		$this->load->view('layout', $data);
	}
	public function validate(){
		if(!isset($_POST['Username']) || !isset($_POST['Password'])){
			redirect('student/login/');
		}
		$user=htmlspecialchars($_POST['Username']);
		$pass=htmlspecialchars($_POST['Password']);
		$token=htmlspecialchars($_POST['Token']);
		$check=$this->M_student->get_id('student', array('Username' => $user));
		if($check->num_rows() == 1){
			if($pass == $check->row('Password')){
				foreach ($check->result() as $user_data) {
					$student_id	= $user_data->StudentID;
					$nis	= $user_data->NIS;
					$username	= $user_data->Username;
					$name		= $user_data->Name;

					$new_data = array(
						'StudentID'=>$student_id,
						'NIS'=>$sysuser_id,
						'StudentUsername'	=> $username,
						'StudentName'=> $name
						);
				}
				$this->session->set_userdata($new_data);
				$start_time = time();
				$this->session->set_userdata(array('start_time'=>$start_time, 'last_time'=>$start_time));
				
				//$this->M_student->success("<b>Selamat datang ".$this->session->userdata('StudentName')."</b>");
				redirect('student/confirm/');
			}
			else{
				$this->session->set_flashdata('user', $user);
				$this->session->set_flashdata('errpass', 'error');
				$this->M_student->wrong("<b>Password tidak sesuai</b>");
				redirect('student/login/');
			}
		}
		else{
			$this->session->set_flashdata('erruser', 'error');
			$this->session->set_flashdata('errpass', 'error');
			$this->M_student->wrong("<b>Username anda tidak ditemukan</b>");
			redirect('student/login/');
		}
	}
	public function logout(){
		//$this->auth->do_logout();
		$this->session->sess_destroy();
		redirect('student/login/');
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
