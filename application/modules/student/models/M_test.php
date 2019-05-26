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
	function get_question($PackageID){
		$this->db->join('package_question', 'PackageID');
		$this->db->where(array('PackageID' => $PackageID));
		return $this->db->get('question');
	}
	function get_question_id($QuestionID){
		$this->db->join('package_question', 'PackageID');
		$this->db->where(array('QuestionID' => $QuestionID));
		return $this->db->get('question');
	}
	function get_studentTest($StudentID, $TestID){
		$this->db->join('student', 'StudentID');
		$this->db->join('test', 'TestID');
		$this->db->where(array('StudentID' => $StudentID, 'TestID' => $TestID));
		return $this->db->get('student_test');
	}
	function add($table, $data){
		$this->db->insert($table, $data);
	}
	function edit($table, $data, $where){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}