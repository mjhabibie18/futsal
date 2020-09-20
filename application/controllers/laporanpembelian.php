<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanpembelian extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
         $this->load->helper(array('url'));
        $this->load->model("laporan");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_laporan/laporan_pembelian',
             "laporanpembelian"=>$this->laporan->datalaporanpembelian()
		);
		$this->load->view('_laporan/laporan_pembelian', $data);
	}
}