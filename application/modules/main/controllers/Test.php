<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_main');
		$this->load->model('M_test');
	}
	public function index(){
		$data['identity']	= $this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['tests']		= $this->M_test->test()->result();
		$data['content']	= 'test';

		$this->load->view('layout', $data);
	}
	public function add_test(){
		$data['identity']	= $this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['package']	= $this->M_main->get('package_question', 'PackageID DESC')->result();
		$data['content'] 	= 'add-test';

		$this->load->view('layout', $data);
	}
}