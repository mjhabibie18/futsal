<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datapembelian extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->model("Pembelian");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_pembelian/datapembelian',
             "datapembelian"=>$this->Pembelian->getAll()
		);
		$this->load->view('_pembelian/dash_pembelian', $data);
	}

	public function lihat_retur()
	{
		$data = array(
			 "content"=>'_pembelian/dataretur',
             "datapembelian"=>$this->Pembelian->lihat_retur()
		);

		$this->load->view('_pembelian/dataretur', $data);
	}

	public function lihatdatapemilik()
	{
		$data = array(
			 "content"=>'_pembelian/datapembelian',
             "datapembelian"=>$this->Pembelian->datapembelianpemilik()
		);
		$this->load->view('_pembelian/dash_pembelian', $data);
	}

	public function formkonf()
	{
		$this->load->view('_pembelian/konfirmasipembelian');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->Pembelian->add($post);
		} else if(isset($_POST['edit'])) {
			$this->Pembelian->edit($post);
		}
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian')."';</script>";
	}

	public function add($id)
	{
		$query = $this->Pembelian->get($id);
		if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
			'page' =>'add',
			'row' => $dataorder
		);
		$data['kode'] = $this->Pembelian->kode();
		$this->load->view('_pembelian/formpembelian', $data);
		} 
		else 
		{
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('databarang')."';</script>";
       }
	}


	public function edit($id)
    {
		$query = $this->Pembelian->got($id);
		if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $dataorder
		);
			$data['kode'] = $this->Pembelian->kodepengiriman();
			$this->load->view('_pembelian/formpembelian', $data);
		} else {
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('cekorderpembelian')."';</script>";
       }
   }

   public function konfirmasipemilik($id)
		{
		$this->Pembelian->konfirmasipemilik($id);
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Ubah');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian/lihatdatapemilik')."';</script>";
	} 

	public function pesananditerima($id)
		{
		$this->Pembelian->pesananditerima($id);
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Ubah');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian')."';</script>";
	} 

	public function lacakpengiriman()
	{
		$data = array(
			 "content"=>'_pembelian/lacakpengiriman',
             "datapembelian"=>$this->Pembelian->cek_pengiriman()
		);
		$this->load->view('_pembelian/cekpengiriman', $data);
	}

	public function statuspengiriman($id=null){

			$query = $this->Pembelian->duatable($id);
			if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
				 "content"=>'_pembelian/lacakpengiriman',
	             "dataorder"=>$this->Pembelian->lacak($id)
			);
	    	$this->load->view('_pembelian/lacakpengiriman', $data);
	       } else {
	        echo "<script>alert('Data Tidak di Temukan');";
	        echo "window.location='".site_url('datapembelian')."';</script>";
		}
	}

	public function konfirmasiretur($id=null){

			$query = $this->Pembelian->cekretur($id);
			if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
				 "content"=>'_pembelian/lacakpengiriman',
	             "dataretur"=>$this->Pembelian->returpemas($id),
	             'page'=>'konfirmasi'
			);
	    	$this->load->view('_pembelian/formreturpemasok', $data);
	       } else {
	        echo "<script>alert('Data Tidak di Temukan');";
	        echo "window.location='".site_url('datapembelian')."';</script>";
		}
	}
	public function cekreturpemasok()
	{
		$data = array(
			 "content"=>'_pembelian/datareturpemasok',
             "datapembelian"=>$this->Pembelian->cek_retur_pemasok()
		);
		$this->load->view('_pembelian/returpemasok', $data);
	}

	public function proseskonfirmasi()
	{
		$data_retur = array(
     	'id_retur' => $this->input->post('id_retur'),
     	'kode_pembelian' => $this->input->post('kode_pembelian'),
     	'tgl_retur' => $this->input->post('tgl_retur'),
     	'status_retur' => $this->input->post('status_retur'),
     );
		$post = $this->input->post(null,true);
			if(isset($_POST['add'])) {
			$this->Pembelian->tambah_retur($data_retur);
		} else if(isset($_POST['konfirmasi'])) {
			$this->Pembelian->konfirmasi($post);
		}
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian/cekreturpemasok')."';</script>";
	}

	public function returpembelian($id){
		$dataretur = new stdClass();
		$dataretur->id_retur = null;
		$dataretur->kode_pembelian= null;
		$dataretur->tgl_retur = null;
		$dataretur->status_retur = null;
		$data = array(
			 "content"=>'_pembelian/lacakpengiriman',
             "dataretur"=>$this->Pembelian->retur($id),
             "page"=>'add',
             "row" => $dataretur
			);
		$data['kode'] = $this->Pembelian->kode_retur();
    	$this->load->view('_pembelian/returpembelian', $data);	       
	}

	public function prosesretur()
	{
		$data_retur = array(
     	'id_retur' => $this->input->post('id_retur'),
     	'kode_pembelian' => $this->input->post('kode_pembelian'),
     	'tgl_retur' => $this->input->post('tgl_retur'),
     	'status_retur' => $this->input->post('status_retur'),
     );
		$post = $this->input->post(null,true);
			if(isset($_POST['add'])) {
			$this->Pembelian->tambah_retur($data_retur);
		} else if(isset($_POST['edit'])) {
			$this->Pembelian->edit($post);
		}
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian')."';</script>";
	}

	public function tambahstatus($id)
	{
		$query = $this->Pembelian->got($id);
		if($query->num_rows()> 0) {
			$dataorder = $query->row();
			$data = array(
			'page' =>'asik',
			'row' => $dataorder
			);
		$this->load->view('_pembelian/tambahpengiriman', $data);
		}
		else 
		{
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('datapembelian/lacakpengiriman')."';</script>";
       }
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['asik'])) {
			$this->Pembelian->asik($post);
		} else if(isset($_POST['edit'])) {
			$this->Pembelian->edit($post);
		}

		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapembelian/lacakpengiriman')."';</script>";
	}
}