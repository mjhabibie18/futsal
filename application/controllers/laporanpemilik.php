<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanpemilik extends CI_Controller {

 /*public function __construct()
    {
        parent::__construct();
        $this->load->model("Penjualan");
    }*/

	public function index()
	{
		$this->load->view('_laporan/lihatlaporan');
	}

	public function laporanpembelian()
	{
		$this->load->view('_laporan/laporan_pembelian');
	}

	public function laporanstokbarang()
	{
		$this->load->view('_laporan/laporan_stokbarang');
	}

	public function laporanpenjualan()
	{
		$this->load->view('_laporan/laporan_penjualan');
	}
}