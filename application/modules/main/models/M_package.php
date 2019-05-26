<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_package extends CI_Model {
	function get_join($table, $join, $primary, $order){
		$this->db->order_by($order);
		$this->db->join($join, $primary);
		return $this->db->get($table);
	}
	function get_package(){
		$this->db->order_by('PackageID DESC');
		$this->db->join('class', 'ClassID');
		$this->db->join('major', 'MajorID');
		$this->db->join('subject', 'SubjectID');
		return $this->db->get('package_question');
	}
	function get_question(){
		$this->db->order_by('QuestionID DESC');
		$this->db->join('package_question', 'PackageID');
		return $this->db->get('question');
	}
}