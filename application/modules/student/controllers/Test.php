
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(is_null($this->session->userdata('StudentID'))){
			redirect('student/login/');
		}
		$this->load->model('M_student');
		$this->load->model('M_test');

	}
	public function index()
	{
		$data['identity']=$this->M_student->identity(array('SchoolCode' => 'B0192'))->row();
		$data['test']=$this->M_test->test()->row();
		$check = $this->M_test->get_studentTest($this->session->userdata('StudentID'), $data['test']->TestID);
		if($check->num_rows() < 1){
			$data=array(
				'StudentID' => $this->session->userdata('StudentID'),
				'TestID' => $data['test']->TestID,
				'DateTest' => $data['test']->Date,
				'StartTest' => date('H:i:s'),
				'Remain' => $data['test']->Duration,
				'StudentIP' => $this->input->ip_address()
				);
			$this->M_test->add('student_test', $data);
			redirect('student/test/index/');
		}
		$data['number'] = $this->M_test->get_question($this->session->userdata('PackageID'));
		$data['time'] = $check->row('Remain');
		$data['content'] = 'test';
		$this->load->view('layout', $data);
	}
	public function question($id){
		$key = $this->M_test->get_question_id($id)->row();
		$answer=$this->M_student->get_id('answer', array('QuestionID' => $key->QuestionID));
			if($answer->num_rows() > 0){
				$answer = $answer->row();
				if($answer->Answer == 'A'){
					$checked = array('checked', '', '', '', '');
				}
				elseif($answer->Answer == 'B'){
					$checked = array('', 'checked', '', '', '');
				}
				elseif($answer->Answer == 'C'){
					$checked = array('', '', 'checked', '', '');
				}
				elseif($answer->Answer == 'D'){
					$checked = array('', '', '', 'checked', '');
				}
				else{
					$checked = array('', '', '', '', 'checked');
				}
			}
			else{
				$checked = array('', '', '', '', '');
			}
			echo "".$key->Question."<br>";
			echo "<input type='hidden' id='QuestionID' value='".$key->QuestionID."'>";
			echo "<input type='radio' ".$checked[0]." id='A'><label class='drinkcard-cc A' onclick='save_answer(".$key->QuestionID.", \"A\")'>&nbsp</label>".$key->A."<br>";
			echo "<input type='radio' ".$checked[1]." id='B'><label class='drinkcard-cc B' onclick='save_answer(".$key->QuestionID.", \"B\")'>&nbsp</label>".$key->B."<br>";
			if(!empty($key->D)){
				echo "<input type='radio' ".$checked[2]." id='C'><label class='drinkcard-cc C' onclick='save_answer(".$key->QuestionID.", \"C\")'>&nbsp</label>".$key->C."<br>";
			}
			if(!empty($key->D)){
				echo "<input type='radio' ".$checked[3]." id='D'><label class='drinkcard-cc D' onclick='save_answer(".$key->QuestionID.", \"D\")'>&nbsp</label>".$key->D."<br>";
			}
			if(!empty($key->E)){
				echo "<input type='radio' ".$checked[4]." id='E'><label class='drinkcard-cc E' onclick='save_answer(".$key->QuestionID.", \"E\")'>&nbsp</label>".$key->E."<br>";
			}
		
	}
	public function list_question(){
		$number = $this->M_test->get_question($this->session->userdata('PackageID'));
        $no=0;
        foreach ($number->result() as $key) {
        	$answer = $this->M_student->get_id('answer', array('StudentID' => $this->session->userdata('StudentID'), 'QuestionID' => $key->QuestionID));
        	$no++;
        	if($answer->row('Uncertain') == 1){
        		echo "
		        <a style='cursor:pointer;' onclick='return question(".$key->QuestionID.",".$no.")'>
		          <div class='item' style='background-color: #eaca08; color: rgb(255, 255, 255); border-color: #eaca08; position: absolute; left: 0px; top: 0px;'>
		            <p style='margin-top:10px; margin-left:13px; font-family:Arial, Helvetica, sans-serif; font-size:24px'>".$no."</p>
								<div id='noti-count' style='order-color:#336898;'><div>".$answer->row('Answer')."</div></div>
								<input type='hidden' id='no".$no."' value='".$key->QuestionID."'>								
		          </div>
		        </a>";
        	}
        	else if(is_null($answer->row('Answer'))){
	        	echo "
		        <a style='cursor:pointer;' onclick='return question(".$key->QuestionID.",".$no.")'>
		          <div class='item' style='background-color: rgb(51, 104, 152); color: rgb(255, 255, 255); border-color: rgb(51, 104, 152); position: absolute; left: 0px; top: 0px;'>
		            <p style='margin-top:10px; margin-left:13px; font-family:Arial, Helvetica, sans-serif; font-size:24px'>".$no."</p>
								<div id='noti-count' style='order-color:#336898;'><div></div></div>
								<input type='hidden' id='no".$no."' value='".$key->QuestionID."'>
		          </div>
		        </a>";
        	}
        	else{
	        	echo "
		        <a style='cursor:pointer;' onclick='return question(".$key->QuestionID.",".$no.")'>
		          <div class='item' style='background-color: #333; color: rgb(255, 255, 255); border-color: #333; position: absolute; left: 0px; top: 0px;'>
		            <p style='margin-top:10px; margin-left:13px; font-family:Arial, Helvetica, sans-serif; font-size:24px'>".$no."</p>
		            <div id='noti-count' style='order-color:#336898;'><div>".$answer->row('Answer')."</div></div>
								<input type='hidden' id='no".$no."' value='".$key->QuestionID."'>
								</div>
		        </a>";
        	}

 	 	} 
	}
	public function update_timer(){
		$data=array('Remain' => $this->input->get('Remain'));
		$where=array('TestID' => $this->input->get('TestID'), 'StudentID' => $this->session->userdata('StudentID'));
		$update= $this->M_test->edit('student_test', $data, $where);
		if(!$update){
			echo "1";
		}
		else{
			echo "0";
		}
	}
	public function save_answer(){
		$QuestionID = $this->input->post('QuestionID');
		$StudentID = $this->session->userdata('StudentID');
		$where = array('StudentID' => $StudentID, 'QuestionID' => $QuestionID);
		$check = $this->M_student->get_id('answer', $where);
		$data=array('StudentID' => $StudentID, 'QuestionID' => $QuestionID, 'Answer' => $this->input->post('Answer'));
		if($check->num_rows() < 1){	
			$this->M_test->add('answer', $data);
		}
		else{
			$this->M_test->edit('answer', $data, $where);
		}
	}
	public function uncertain(){
		$QuestionID = $this->input->post('QuestionID');
		$StudentID = $this->session->userdata('StudentID');
		$where = array('StudentID' => $StudentID, 'QuestionID' => $QuestionID);
		$check = $this->M_student->get_id('answer', $where);
		$data=array('StudentID' => $StudentID, 'QuestionID' => $QuestionID);
		if($check->num_rows() < 1){	
			$this->M_test->add('answer', $data);
		}
		else{
			if($check->row('Uncertain') == 1){
				$this->M_test->edit('answer', array_merge($data, array('Uncertain' => 0)), $where);
			}
			else{
				$this->M_test->edit('answer', array_merge($data, array('Uncertain' => 1)), $where);
			}
		}
	}
	public function check_uncertain(){
		$QuestionID = $this->input->post('QuestionID');
		$StudentID = $this->session->userdata('StudentID');
		$where = array('StudentID' => $StudentID, 'QuestionID' => $QuestionID);
		$check = $this->M_student->get_id('answer', $where);
		$data=array('StudentID' => $StudentID, 'QuestionID' => $QuestionID);
		if($check->row('Uncertain') == 1)
		{
			echo "0";
		}
		else if(!empty($check->row('Answer')) ){	
			echo "1";
		}
		else{
			echo "2";
		}
	}
	public function finish()
	{
		echo "Time is up";
	}
}