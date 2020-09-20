<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datapengguna extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->model("Pengguna");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_pengguna/datapengguna',
             "datapengguna"=>$this->Pengguna->getAll()
		);
		$this->load->view('_pengguna/dash_pengguna', $data);
	}

	public function add()
	{
		$datapengguna = new stdClass();
		$datapengguna->id = null;
		$datapengguna->username = null;
		$datapengguna->nama_pengguna= null;
		$datapengguna->password = null;
		$datapengguna->alamat = null;
		$datapengguna->no_telp = null;
		$datapengguna->email = null;
		$datapengguna->status = null;
		$data = array(
			'page' =>'add',
			'row' => $datapengguna
		);
		$this->load->view('_pengguna/form_pengguna', $data);
	}
	public function edit($id)
    {
		$query = $this->Pengguna->get($id);
		if($query->num_rows()> 0) {
			$datapengguna = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $datapengguna
		);
			$this->load->view('_pengguna/form_pengguna', $data);
		} else {
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('databarang')."';</script>";
       }
   }

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->Pengguna->add($post);
		} else if(isset($_POST['edit'])) {
			$this->Pengguna->edit($post);
		}

		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapengguna')."';</script>";
	}

	
	public function hapus($id)
		{
		$this->Pengguna->hapus($id);
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Hapus');</script>";
       }
        echo "<script>window.location='".site_url('datapengguna')."';</script>";
	} 
}