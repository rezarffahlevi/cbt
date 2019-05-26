<?php if (!defined("BASEPATH")) exit ('No direct script access allowed.'); 
class Auth
{
	function do_login($username, $password){
		$CI =& get_instance();
		$CI->db->from('sysuser');
		$CI->db->where('Username', $username);
		$CI->db->where('Password', $password);
		$data = $CI->db->get();
		if ($data->num_rows() == 0 ) {
			return false;
		}
		else{
			foreach ($data->result() as $user_data) {
				$sysuser_id	= $user_data->SysuserID;
				$username		= $user_data->Username;
				$name		= $user_data->Name;
				$level		= $user_data->Level;

				$new_data = array(
					'SysuserID'=>$sysuser_id,
					'Username'	=> $username,
					'Name'=> $name,
					'Level'=> $level
					);
			}

			$CI->session->set_userdata($new_data);
			$start_time = time();
			$CI->session->set_userdata(array('start_time'=>$start_time, 'last_time'=>$start_time));
					
			return TRUE;
		}
	}
	function last_login(){
		$CI =& get_instance();
		$CI->db->query("UPDATE sysuser SET last_login = SYSDATE() WHERE id_sysuser = '".$CI->session->userdata('id_sysuser')."'");
	}
	function is_logged_in(){
		$CI =& get_instance();
		if ($CI->session->userdata('SysuserID')=='') {
			return false;
		}
		else{
			return true;
		}
	}

	function bisa_apa_aja($base){
		$CI =& get_instance();
		$id_user = $CI->session->userdata('id_sysuser');
		$CI->db->select('hak_akses.insert, hak_akses.update, hak_akses.delete, hak_akses.download, hak_akses.upload');
		$CI->db->from('hak_akses');
		$CI->db->join('menu',
			'hak_akses.id_menu=menu.id_menu', 'left');
		$CI->db->where('hak_akses.id_sysuser', $id_user);
		$CI->db->where('menu.link', $base);
		$data = $CI->db->get();
		if ($data->num_rows() > 0) {
			$hasil = $data->result();
			$update = $data->row('update');
			$insert = $data->row('insert');
			$delete = $data->row('delete');
			$download = $data->row('download');
			$upload = $data->row('upload');

		$data_baru = array (
			'insert' => $insert,
			'update' => $update,
			'delete' => $delete,
			'upload' => $upload,
			'download' => $download
			);
		$CI->session->set_userdata($data_baru);

		return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function do_logout(){
		$CI =& get_instance();
		$CI->session->sess_destroy();
	}

}
 ?>               