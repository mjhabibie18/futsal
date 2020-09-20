	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class barangkosong extends CI_Controller {

	 public function __construct()
	    {
	        parent::__construct();
	        $this->load->helper(array('url'));
	        $this->load->model("Barang");
	    }

		public function index()
		{
			$data = array(
				 "content"=>'_barang/barangkosong',
	             "barangkosong"=>$this->Barang->get_barang_kosong()
	             );
			$this->load->view('_barang/barangkosong', $data);
		}
	}