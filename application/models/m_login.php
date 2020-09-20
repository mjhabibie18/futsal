<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

	public function login ($post)
	{
		$this->db->select ('*');
		$this->db->from('user');
		$this->db->where('username',$post['username']);
		$this->db->where('password',$post['password']);
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('login');
		if($id != null) {
			$this->db->where('id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

 	public function got()
    {
    	$asik=$this->session->userdata("nama_pengguna");
      	$query=$this->db->query("SELECT * FROM tb_pengguna WHERE  nama_pengguna = '$asik'");
        return $query; 
    }

		public function add($post)
		{
			$params ['username'] = $post['username'];
			$params ['password'] = sha1($post['password']);
			$params ['role'] = $post['role'];
			$params ['nama_pengguna'] = $post['nama_pengguna'];
			$this->db->insert('login', $params);
		}         
}