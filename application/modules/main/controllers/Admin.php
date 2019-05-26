<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_main');
	}
	public function index()
	{
		$data['teachers'] = $this->M_main->get_id('sysuser', array('Level' => 2))->num_rows();
		$data['students'] = $this->M_main->get('student')->num_rows();
		$data['test'] = $this->M_main->get_id('test', array('Date' => date('Y-m-d'),'Status' => 1))->num_rows();
		$data['admin'] = $this->M_main->get_id('sysuser', array('Level' => 1))->num_rows();
		$data['identity']=$this->M_main->identity(array('SchoolCode' => 'B0192'))->row();
		$data['content'] = 'dashboard';
		$data['server']=array('name' => $_SERVER['SERVER_NAME'], 'port' => $_SERVER['SERVER_PORT'], 'remote_addr' => $_SERVER['REMOTE_ADDR'], 'host_name' => gethostbyaddr($_SERVER['REMOTE_ADDR']));
		$this->load->view('layout', $data);
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
