<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_main');
		$this->load->model('M_master');
	}
	public function Student()
	{
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']=$this->M_master->get_student('student', 'class', 'ClassID', 'Username ASC')->result();
		$data['content'] = 'student';

		$this->load->view('layout', $data);
	}
	public function Subject()
	{
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']=$this->M_main->get('subject', 'SubjectName ASC')->result();
		$data['content'] = 'subject';

		$this->load->view('layout', $data);
	}
	public function Class()
	{
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']=$this->M_master->get_join('class', 'major', 'MajorID', 'ClassName ASC')->result();
		$data['content'] = 'class';

		$this->load->view('layout', $data);
	}
	public function Major()
	{
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']=$this->M_main->get('major', 'MajorName ASC')->result();
		$data['content'] = 'major';

		$this->load->view('layout', $data);
	}

}