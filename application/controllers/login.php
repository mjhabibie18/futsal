<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	
	public function exlogin()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['login'])) {
			$this->load->model('m_login');
			$query = $this->m_login->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id' => $row->ID,
					'username' => $row->username,
					'id_role' => $row->id_role
				);
				$this->session->set_userdata($params);
				
				echo "<script> 
					alert('selamat, Login berhasil');
					window.location='".site_url('Welcome/dash')."';
				</script>";
			} else {

				echo "<script> 
					alert('Maaf Username atau password salah');
					window.location='".site_url('Welcome/index')."';
				</script>";
			}

		} 
		
	}

public function ganti_password()
 { 
 	$this->load->model('m_login');
		$query = $this->m_login->got();
		if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $dataorder
		);
			$this->load->view('gantipassword', $data);
		} else {
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('cekorderpembelian')."';</script>";
       }
   }
 

	public function logout()
	{
		$params = array ('userid','username','status', 'nama_pengguna');
		$this->session->unset_userdata($params);
		redirect('welcome/index');
	}
}