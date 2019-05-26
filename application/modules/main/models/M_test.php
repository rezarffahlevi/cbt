<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {
	function test(){
		$this->db->order_by('StartTime DESC');
		$this->db->join('package_question', 'packageID');
		$this->db->join('subject', 'SubjectID');
		$this->db->join('class', 'ClassID');
		$this->db->join('major', 'MajorID');
		$this->db->join('sysuser', 'SysuserID');
		return $this->db->get('test');
	}
}