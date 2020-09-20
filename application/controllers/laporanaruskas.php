<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanaruskas extends CI_Controller {

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
             "laporanaruskas"=>$this->laporan->laporanaruskas()
		);
		$this->load->view('_laporan/laporan_aruskas', $data);
	}
}