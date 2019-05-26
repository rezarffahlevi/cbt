<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_main');
		$this->load->model('M_package');
	}
	public function index()
	{
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']=$this->M_package->get_package()->result();
		$data['content'] = 'package';

		$this->load->view('layout', $data);
	}
	public function question($package){
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['results']=$this->M_package->get_question($package)->result();
		$data['content'] = 'question';

		$this->load->view('layout', $data);
	}
	public function add_package(){
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['subject']=$this->M_main->get('subject', 'SubjectName ASC')->result();
		$data['class']=$this->M_main->get('class', 'ClassName ASC')->result();
		$data['content'] = 'add-package';

		$this->load->view('layout', $data);
	}
	public function add_question(){
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['content'] = 'add-question';

		$this->load->view('layout', $data);
	}
}