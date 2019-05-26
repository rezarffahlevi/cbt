<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {
	function get_join($table, $join, $primary, $order){
		$this->db->order_by($order);
		$this->db->join($join, $primary);
		return $this->db->get($table);
	}
	function get_student(){
		$this->db->order_by('Username ASC');
		$this->db->join('class', 'ClassID');
		$this->db->join('major', 'MajorID');
		return $this->db->get('student');
	}
}