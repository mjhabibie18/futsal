<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class databarang extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model("Barang");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_barang/databarang',	
             "databarang"=>$this->Barang->getAll()
		);
		$this->load->view('_barang/dash_barang',$data);
	}

	public function add()
	{
		$datbarang = new stdClass();
		$datbarang->kode_brg = null;
		$datbarang->nama_brg= null;
		$datbarang->kategori_brg = null;
		$datbarang->ukuran_brg = null;
		$datbarang->hrg_jual = null;
		$datbarang->hrg_beli = null;
		$datbarang->stok_brg = null;
		$datbarang->nama_pemasok = null;
		$data = array(
			'page' =>'add',
			'row' => $datbarang
		);
		$data['kode'] = $this->Barang->kode();
		$data['tampil'] = $this->Barang->tampil();
		$data['tampil_pengguna']=$this->Barang->tampil_pengguna();
		$data['dropdown'] = $this->Barang->tampil_data();
		$this->load->view('_barang/form_barang', $data);
	}
	
 	public function edit($id)
    {
		$query = $this->Barang->get($id);
		if($query->num_rows()> 0) {
			$dafguru = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $dafguru
		);
			$data['dropdown'] = $this->Barang->tampil_data();
			$data['tampil_pengguna'] = $this->Barang->tampil_pengguna();
			$this->load->view('_barang/form_barang', $data);
		} else {
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('databarang')."';</script>";
       }
   }

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->Barang->add($post);
		} else if(isset($_POST['edit'])) {
			$this->Barang->edit($post);
		}

		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('databarang')."';</script>";
	}
	
	public function hapus($id)
	{
		$this->Barang->hapus($id);
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Hapus');</script>";
       }
        echo "<script>window.location='".site_url('databarang')."';</script>";
	} 
	
}