<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanpendapatan extends CI_Controller {

 public function __construct()
    {
        parent::__construct();
         $this->load->helper(array('url'));
        $this->load->model("laporan");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_laporan/laporan_stokbarang',
             "laporanaruskas"=>$this->laporan->laporanpendapatan()
		);
		$this->load->view('_laporan/laporanpendapatan', $data);
	}
}