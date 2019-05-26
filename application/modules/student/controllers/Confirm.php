<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(is_null($this->session->userdata('StudentID'))){
			redirect('student/login/');
		}
		$this->load->model('M_student');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$where = array('SchoolCode' => 'B0192');
		$data['identity'] = $this->M_student->identity($where)->row();
		$data['student'] = $this->M_student->get_student($this->session->userdata('StudentUsername'))->row();
		$token=$this->M_student->get_id('test', array('Date' => date('Y-m-d')));
		if($token->num_rows() < 1){
			$data['disabled'] = array(" disabled", "<div class='alert alert-danger'><center>Tidak ada Ujian</center></div>");
		}
		else{
			$data['disabled'] = array("","");
		}
		$data['content'] = 'confirm';
		$this->load->view('layout', $data);
	}
	public function token_check(){
		if(!isset($_POST['Token'])){
			redirect('student/confirm/');
		}
		else{
			$token=htmlspecialchars($_POST['Token']);
			$check=$this->M_student->get_id('test', array('Token' => $token));
			if($check->num_rows() == 1){
				if($check->row('Date') == date('Y-m-d')){
					if($check->row('Until') < date('H:i:s')){
						$this->M_student->wrong("<b>Anda terlambat mengikuti ujian.</b>");
						redirect('student/confirm/');
					}
					else{
						$this->session->set_userdata('PackageID', $check->row('PackageID'));
						$this->session->set_userdata('TestID', $check->row('TestID'));
						redirect('student/confirm/subject/');
					}
				}
				else{
					$this->M_student->wrong("<b>Token sudah kedaluarsa.</b>");
					redirect('student/confirm/');
				}
			}
			else{
				$this->M_student->wrong("<b>Token salah / sudah kedaluarsa.</b>");
				redirect('student/confirm/');
			}
		}
	}
	public function subject(){
		if(empty($this->session->userdata('TestID'))){
			$this->M_student->wrong("<b>Masukan token terlebih dahulu.</b>");
			redirect('student/confirm/');
		}
		else{
			$where = array('SchoolCode' => 'B0192');
			$data['identity'] = $this->M_student->identity($where)->row();
			$test = $this->M_student->get_test(array('TestID' => $this->session->userdata('TestID')))->row();
			($test->StartTime > date('H:i:s')) ? $data['disabled'] = array("text-danger", " disabled", " - Belum dimulai") :
				$data['disabled'] = array("", "", "");

			$data['test'] = $test;
			$data['content'] = 'subject';
			$this->load->view('layout', $data);
		}
	}
}