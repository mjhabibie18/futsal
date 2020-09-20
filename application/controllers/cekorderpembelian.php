<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cekorderpembelian extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
        $this->load->model("Pembelian");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_pembelian/dash_pemasok',
             "datapembelian"=>$this->Pembelian->cek_pembelian()
		);

		$this->load->view('_pembelian/dash_pemasok', $data);
	}
}