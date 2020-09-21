	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datapenjualan extends CI_Controller {

public function __construct()
   	{
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model("Penjualan");
    }

	public function index()
	{
		$data = array(
			 "content"=>'_penjualan/datapenjualan',
             );
		$this->load->view('_penjualan/dash_penjualan',$data);
	}

	public function get_barang(){
        $kode_brg=$this->input->get('kode_brg');
        $data=$this->Penjualan->get_data_barang_bykode($kode_brg);
        echo json_encode($data);
    }

    public function getNamaCustomer(){
    	$ID = $this->input->get('ID');
        $data=$this->Penjualan->getNama($ID);
        echo json_encode($data);
    }

	public function get_detail()
	{
		$kode_trx=$this->input->get('kode_trx');
        $data=$this->Penjualan->get_data_detail($kode_trx);
        echo json_encode($data);
	}

	public function simpanData()
   {
   	 	$data=$this->Penjualan->save_product();
        echo json_encode($data);
      }

	public function edit($id)
    {

		$query = $this->Penjualan->get($id);
		if($query->num_rows()> 0) {
			$dafguru = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $dafguru
		);	
			/*$data['dropdown'] = $this->Barang->tampil_data();*/
			$this->load->view('_penjualan/form_penjualan', $data);
		} else {
          echo "<script>alert('Data Tidak di Temukan');";
          echo "window.location='".site_url('datapenjualan')."';</script>";
       }
	}

	public function add()
	{
		$datpenjualan = new stdClass();
		$datpenjualan->kode_trx = null;
		$datpenjualan->tgl_trx= null;
		$datpenjualan->kode_brg = null;
		$datpenjualan->nama_brg = null;
		$datpenjualan->ukuran_brg = null;
		$datpenjualan->hrg_brg = null;
		$datpenjualan->jml_brg = null;
		$datpenjualan->hrg_total = null;
		$datpenjualan->jml_hrg = null;
		$data = array(
			"content"=>'_penjualan/tambah_penjualan',
            "datapenjualan"=>$this->Penjualan->got(),
			'page' =>'add',
			'row' => $datpenjualan
		);

		$data['kode'] = $this->Penjualan->kode();
		/*$data['tampil'] = $this->Barang->tampil();
		$data['dropdown'] = $this->Barang->tampil_data();*/
		$this->load->view('_penjualan/form_penjualan', $data);
	}

	public function get_detail_trx()
	{
		$data['kode'] = $this->Penjualan->kode();
		echo json_encode($data);
	}

	public function prosesdetail()
	{
		$data_detailtrx = array(
     	'kode_trx' => $this->input->post('kode_trx'),
     	'kode_brg' => $this->input->post('kode_brg'),
     	'nama_brg' => $this->input->post('nama_brg'),
     	'ukuran_brg' => $this->input->post('ukuran_brg'),
     	'hrg_brg' => $this->input->post('hrg_brg'),
     	'jml_brg' => $this->input->post('jml_brg'),
     	'hrg_total' => $this->input->post('hrg_total'),
     );
		$post = $this->input->post(null,true);
			if(isset($_POST['add'])) {
			$this->Penjualan->tambah_detailtrx($data_detailtrx);
		} else if(isset($_POST['edit'])) {
			$this->Penjualan->edit($post);
		}
		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapenjualan/add')."';</script>";
	}

	public function process()
	{
		$data_transaksi = array(
    	'kode_trx' => $this->input->post('kode_trx'),
    	'tgl_trx' => $this->input->post('tgl_trx'),
    	'jml_hrg' => $this->input->post('jml_hrg'),
     	);
 
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->Penjualan->tambah_transaksi($data_transaksi);
		} else if(isset($_POST['edit'])) {
			$this->Penjualan->edit($post);
		}

		if($this->db->affected_rows() > 0){
    	echo "<script>alert('Data berhasil di Simpan');</script>";
       }
        echo "<script>window.location='".site_url('datapenjualan')."';</script>";
	}

	function data_barang(){
        $data=$this->Penjualan->barang_list();
        echo json_encode($data);
    }

	public function hapus($id)
	{
		$this->Penjualan->hapus($id);
		if($this->db->affected_rows() > 0){
	    	echo "<script>alert('Data berhasil di Hapus');</script>";
	    }
        echo "<script>window.location='".site_url('datapenjualan')."';</script>";
	} 

	public function cetakstruk($id){
        $pdf = new FPDF('l','mm',array(100,100));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',8);
        // mencetak string 
        $pdf->Cell(0,2,'Struk Penjualan',0,1,'C');
        $pdf->Cell(0,7,'Waroeng Bola',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',8,);
        $query = $this->Penjualan->get($id);
		if($query->num_rows()> 0) {
			$datalaporan = $query->row();
			$data = array(
			'row' => $datalaporan
		);
		$pdf->Cell(23,5,'Kode Transaksi',2,0);
		$pdf->Cell(2,5,':',2,0,);
 		$pdf->Cell(0,5,$datalaporan->kode_trx,0,1);	
        $pdf->Cell(23,5,'Tgl_trx',2,0);
        $pdf->Cell(2,5,':',2,0,);
        $pdf->Cell(10,5,$datalaporan->tgl_trx,0,1);
		$pdf->SetFont('Arial','B',8);
        $pdf->Cell(5,6,'No',2,0,'L');
        $pdf->Cell(35,6,'Nama Brg',2,0,'C');
        $pdf->Cell(13,6,'Size',2,0,'C');
        $pdf->Cell(15,6,'Hrg',2,0,'C');
        $pdf->Cell(8,6,'Qlty',2,0,'L');
        $pdf->Cell(10,6,'Jml Hrg',2,1,'L');
        $pdf->SetFont('Arial','',10);	
        $no=1;
        $laporan = $this->db->query("SELECT * FROM  tb_detailtrx WHERE kode_trx='$datalaporan->kode_trx'")->result();     
       foreach ($laporan as $row){
          $pdf->Cell(5,6,$no++,2,0,'L'); 	
        $pdf->Cell(35,6,$row->nama_brg,2,0,'L');
        $pdf->Cell(13,6,$row->ukuran_brg,2,0,'L');
        $pdf->Cell(15,6,$row->hrg_brg,2,0,'L');
        $pdf->Cell(8,6,$row->jml_brg,2,0,'C');
        $pdf->Cell(15,6,$row->hrg_total,2,1,'C');
    }
 		$pdf->SetFont('Arial','B',10);
 		$pdf->Cell(2,5,'',2,1,);
 		$jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM tb_detailtrx WHERE kode_trx='$datalaporan->kode_trx'")->result();
 		$totalHarga = 0;
		foreach ($jumlah as $jml){

            $totalHarga = $jml->total;
        }
		$pdf->Cell(23,5,'Total Harga',2,0,);
		$pdf->Cell(2,5,':',2,0,);
		$pdf->Cell(2,5,$totalHarga,2,0,);
        }
        $pdf->Output();
    }
}

   