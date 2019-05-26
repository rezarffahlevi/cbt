<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_student extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function identity($where){
		$this->db->where($where);
		return $this->db->get('identity');	
	}
	function get_id($table, $where){
		$this->db->where($where);
		return $this->db->get($table);
	}
	function get($table, $order=null){
		$this->db->order_by($order);
		return $this->db->get($table);
	}
	function get_student($where){
		$this->db->join('class', 'ClassID');
		$this->db->join('major', 'MajorID');
		$this->db->where(array('Username' => $where));
		return $this->db->get('student');
	}
	function get_test($where){
		$this->db->join('package_question', 'PackageID');
		$this->db->join('subject', 'SubjectID');
		$this->db->join('class', 'ClassID');
		$this->db->join('major', 'MajorID');
		$this->db->where($where);
		return $this->db->get('test');
	}

	function add($table, $data){
		$this->db->insert($table, $data);
	}
	function success($mess){
		$this->session->set_flashdata("mess", "<div class='alert alert-success'><center>".$mess."</center></div>");
	}
	function wrong($mess){
		$this->session->set_flashdata("mess", "<div class='alert alert-danger'><center>".$mess."</center></div>");
	}
	function warning($mess){
		$this->session->set_flashdata("mess", "<div class='alert alert-warning'><center>".$mess."</center></div>");
	}
}