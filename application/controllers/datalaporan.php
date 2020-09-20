<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datalaporan extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->library('pdf');
    $this->load->helper(array('url'));
    $this->load->model("laporan");
}

public function index()
{
	$this->load->view('_laporan/dash_laporan');
}

public function laporanpemilik()
{
	$this->load->view('_laporan/lihatlaporan');
}	

public function addlaporanpenjualan()
{
	$datalaporan = new stdClass();
	$datalaporan->id_laporan = null;
	$datalaporan->dari_tgl = null;
	$datalaporan->sampai_tgl = null;
	$datalaporan->jenis_laporan = null;
	$data = array(
		'page' => 'laporanpenjualan',
		'row' => $datalaporan
		);
    $data['kode'] = $this->laporan->kodepenjualan();
	$this->load->view('_laporan/tambah_laporan',$data);
}

public function addlaporanpendapatan()
{
    $datalaporan = new stdClass();
    $datalaporan->id_laporan = null;
    $datalaporan->dari_tgl = null;
    $datalaporan->sampai_tgl = null;
    $datalaporan->jenis_laporan = null;
    $data = array(
        'page' => 'laporanpendapatan',
        'row' => $datalaporan
        );
    $data['kode'] = $this->laporan->kodependapatan();
    $this->load->view('_laporan/tambah_laporan',$data);
}

public function addlaporanpembelian()
{
	$datalaporan = new stdClass();
	$datalaporan->id_laporan = null;
	$datalaporan->dari_tgl = null;
	$datalaporan->sampai_tgl = null;
	$datalaporan->jenis_laporan = null;
	$data = array(
	   'page' => 'laporanpembelian',
	   'row' => $datalaporan
		);
    $data['kode']=$this->laporan->kodepembelian();
	$this->load->view('_laporan/tambah_laporan',$data);
}

public function addlaporanaruskas()
{
    $datalaporan = new stdClass();
    $datalaporan->id_laporan = null;
    $datalaporan->dari_tgl = null;
    $datalaporan->sampai_tgl = null;
    $datalaporan->jenis_laporan = null;
    $data = array(
        'page' => 'laporanaruskas',
        'row' => $datalaporan
        );
    $data['kode']=$this->laporan->kodearuskas();
    $this->load->view('_laporan/tambah_laporan',$data);
}

public function process()
{
	$post = $this->input->post(null, TRUE);
	if(isset($_POST['laporanpenjualan'])) {
		$this->laporan->add($post);
	} else if(isset($_POST['laporanpembelian'])) {
		$this->laporan->add($post);
	}else if(isset($_POST['laporanaruskas'])) {
        $this->laporan->add($post);
    }else if(isset($_POST['laporanpendapatan'])) {
        $this->laporan->add($post);
    }
	if($this->db->affected_rows() > 0)
    {
    echo "<script>alert('Data berhasil di Simpan');</script>";
    }
    echo "<script>window.location='".site_url('welcome/dash')."';</script>";
	}

public function cetaklaporanpenjualan($id){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(0,7,'DATA LAPORAN WAROENG BOLA',0,1,'C');
        $pdf->Cell(0,7,'JAKARTA TIMUR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10,);
        $query = $this->laporan->getbykode($id);
		if($query->num_rows()> 0) {
			$datalaporan = $query->row();
			$data = array(
			'row' => $datalaporan
		);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,'Id Laporan :',2,0,);
 		$pdf->Cell(10,5,$datalaporan->id_laporan,0,1);	
        $pdf->Cell(30,5,'Dari Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->dari_tgl,0,1);	
        $pdf->Cell(30,5,'Sampai Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->sampai_tgl,0,1);	
        $pdf->Cell(30,5,'Jenis Laporan :',2,0);
        $pdf->Cell(10,5,$datalaporan->jenis_laporan,0,1);
         $pdf->Cell(30,5,' ',2,1);	
        $pdf->SetFont('Arial','B',10);
         $query = $this->laporan->getbykode();
		if($query->num_rows()> 0) {
			$dafguru = $query->row();
			$data = array(
			'row' => $dafguru
		);
		$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'Kode Trx',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Ukuran Brg',1,0,'C');
        $pdf->Cell(30,6,'Harga Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);

        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx WHERE tgl_trx BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl'")->result();       
       foreach ($laporan as $row){
          $pdf->Cell(10,6,$no++,1,0,'C'); 	
        $pdf->Cell(20,6,$row->kode_trx,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_trx,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->ukuran_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_total,1,1,'C');
        }
        $pdf->Cell(10,6,'',2,1);
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx WHERE tgl_trx BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl'")->result();
        $totalHarga1 = 0;
        foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
        $pdf->Cell(60,6,'TOTAL PENJUALAN',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga1,2,0);  
        $pdf->Output();
    }
}
}
 public function cetaklaporanpembelian($id){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(0,7,'DATA LAPORAN WAROENG BOLA',0,1,'C');
        $pdf->Cell(0,7,'JAKARTA TIMUR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10,);
        $query = $this->laporan->getbykode($id);
        if($query->num_rows()> 0) {
            $datalaporan = $query->row();
            $data = array(
            'row' => $datalaporan
        );
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,'Id Laporan :',2,0,);
        $pdf->Cell(10,5,$datalaporan->id_laporan,0,1);  
        $pdf->Cell(30,5,'Dari Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->dari_tgl,0,1);    
        $pdf->Cell(30,5,'Sampai Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->sampai_tgl,0,1);  
        $pdf->Cell(30,5,'Jenis Laporan :',2,0);
        $pdf->Cell(10,5,$datalaporan->jenis_laporan,0,1);
         $pdf->Cell(30,5,' ',2,1);  
        $pdf->SetFont('Arial','B',10);
         $query = $this->laporan->getbykode();
        if($query->num_rows()> 0) {
            $dafguru = $query->row();
            $data = array(
            'row' => $dafguru
        );
        $pdf->Cell(10,6,'No',1,0,'C');  
        $pdf->Cell(30,6,'Kode Transaksi',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Barang',1,0,'C');
        $pdf->Cell(30,6,'Harga Barang',1,0,'C');
        $pdf->Cell(30,6,'Nama Pemasok',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);

        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_pembelian WHERE tgl_pembelian BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl' AND status_pembelian='Selesai'")->result();     
      foreach ($laporan as $row){
        $pdf->Cell(10,6,$no++,1,0);
        $pdf->Cell(30,6,$row->kode_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->nama_pengguna,1,0,'C');
        $pdf->Cell(30,6,$row->jml_hrg,1,1,'C');
        }
        $pdf->Cell(10,6,'',2,1);
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(jml_hrg) as total FROM tb_pembelian WHERE tgl_pembelian BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl' AND status_pembelian='Selesai'")->result(); 
        $totalHarga1 = 0;
        foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
        $pdf->Cell(60,6,'TOTAL PEMBELIAN',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga1,2,0);  
        $pdf->Output();
    }
}
}

		public function cetaklaporanaruskas($id){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(0,7,'DATA LAPORAN WAROENG BOLA',0,1,'C');
        $pdf->Cell(0,7,'JAKARTA TIMUR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10,);
        $query = $this->laporan->getbykode($id);
		if($query->num_rows()> 0) {
			$datalaporan = $query->row();
			$data = array(
			'row' => $datalaporan
		);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,'Id Laporan :',2,0,);
 		$pdf->Cell(10,5,$datalaporan->id_laporan,0,1);	
        $pdf->Cell(30,5,'Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->dari_tgl,0,1);	
        $pdf->Cell(30,5,'Jenis Laporan :',2,0);
        $pdf->Cell(10,5,$datalaporan->jenis_laporan,0,1);
        $pdf->Cell(30,5,' ',2,1);	
        $pdf->Cell(30,5,'PENJUALAN ',2,1);	
        $pdf->SetFont('Arial','B',10);
       
		$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'Kode Trx',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Ukuran Brg',1,0,'C');
        $pdf->Cell(30,6,'Harga Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx WHERE tgl_trx='$datalaporan->dari_tgl'")->result();       
       foreach ($laporan as $row){
        $pdf->Cell(10,6,$no++,1,0,'C'); 	
        $pdf->Cell(20,6,$row->kode_trx,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_trx,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->ukuran_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_total,1,1,'C');
}
        $jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM  tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx  WHERE tgl_trx='$datalaporan->dari_tgl'")->result();
        $totalHarga1 = 0;
        foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
         $pdf->SetFont('Arial','B',10,);
        $pdf->Cell(60,6,'TOTAL PENJUALAN',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga1,2,0);
        $pdf->SetFont('Arial','B',10,);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,'PEMBELIAN',2,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');  
        $pdf->Cell(30,6,'Kode Transaksi',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Barang',1,0,'C');
        $pdf->Cell(30,6,'Harga Barang',1,0,'C');
        $pdf->Cell(30,6,'Nama Pemasok',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_pembelian WHERE tgl_pembelian = '$datalaporan->dari_tgl' AND status_pembelian='Selesai'")->result();        
       foreach ($laporan as $row){
        $pdf->Cell(10,6,$no++,1,0);
        $pdf->Cell(30,6,$row->kode_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->nama_pengguna,1,0,'C');
        $pdf->Cell(30,6,$row->jml_hrg,1,1,'C');
        }
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(jml_hrg) as total FROM tb_pembelian WHERE tgl_pembelian='$datalaporan->dari_tgl' AND status_pembelian='Selesai'")->result();
        $totalHarga2 = 0;
        foreach ($jumlah as $jml){

            $totalHarga2 = $jml->total;
        }
        $pdf->Cell(60,6,'TOTAL PEMBELIAN',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga2,2,0);
        $pdf->SetFont('Arial','B',10,);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->Cell(30,5,' ',2,1);
		$pdf->SetFont('Arial','B',10);
		$jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM  tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx WHERE tgl_trx='$datalaporan->dari_tgl'")->result();
		$totalHarga1 = 0;
		foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
  		$pdf->Cell(60,6,'LAPORAN ARUS KAS HARIAN',2,0);
  		$pdf->Cell(10,6,'=',2,0);
		$pdf->cell(20,6,$totalHarga1,2,0);	
		$pdf->SetFont('Arial','B',10);
		$jumlah= $this->db->query("SELECT SUM(jml_hrg) as total FROM tb_pembelian WHERE tgl_pembelian='$datalaporan->dari_tgl' AND status_pembelian='Selesai'")->result();
		$totalHarga2 = 0;
		foreach ($jumlah as $jml){

            $totalHarga2 = $jml->total;
        }
  		$pdf->Cell(10,6,' - ',2,0);
		$pdf->cell(20,6,$totalHarga2,2,1);
		$pdf->SetFont('Arial','B',10);
		$totalHarga = 0;
		foreach ($jumlah as $jml){

            $totalHarga = $jml->total;
        }
  		$pdf->Cell(60,6,'',2,0);
  		$pdf->Cell(10,6,'=',2,0);
		$pdf->cell(20,6,$totalHarga1 - $totalHarga2,2,0);
        $pdf->Output();    
}
}
public function cetaklaporanpendapatan($id){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(0,7,'DATA LAPORAN WAROENG BOLA',0,1,'C');
        $pdf->Cell(0,7,'JAKARTA TIMUR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',10,);
        $query = $this->laporan->getbykode($id);
        if($query->num_rows()> 0) {
            $datalaporan = $query->row();
            $data = array(
            'row' => $datalaporan
        );
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,'Id Laporan :',2,0,);
        $pdf->Cell(10,5,$datalaporan->id_laporan,0,1);  
        $pdf->Cell(30,5,'Per Tanggal :',2,0);
        $pdf->Cell(10,5,$datalaporan->sampai_tgl,0,1);    
        $pdf->Cell(30,5,'Jenis Laporan :',2,0);
        $pdf->Cell(10,5,$datalaporan->jenis_laporan,0,1);
        $pdf->Cell(30,5,' ',2,1);   
        $pdf->Cell(30,5,'PEMASUKKAN ',2,1);  
        $pdf->SetFont('Arial','B',10);
       
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'Kode Trx',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Ukuran Brg',1,0,'C');
        $pdf->Cell(30,6,'Harga Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Brg',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx WHERE tgl_trx BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl'")->result();       
       foreach ($laporan as $row){
        $pdf->Cell(10,6,$no++,1,0,'C');     
        $pdf->Cell(20,6,$row->kode_trx,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_trx,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->ukuran_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_total,1,1,'C');
}
        $pdf->SetFont('Arial','B',10,);
        $jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx  WHERE tgl_trx BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl'")->result();
        $totalHarga1 = 0;
        foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
        $pdf->Cell(35,5,'Total Pemasukkan =',2,0);
        $pdf->Cell(30,5,$totalHarga1,2,1);
        $pdf->SetFont('Arial','B',10,);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,'PENGELUARAN',2,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');  
        $pdf->Cell(30,6,'Kode Transaksi',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Trx',1,0,'C');
        $pdf->Cell(25,6,'Kode Barang',1,0,'C');
        $pdf->Cell(50,6,'Nama Barang',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Barang',1,0,'C');
        $pdf->Cell(30,6,'Harga Barang',1,0,'C');
        $pdf->Cell(30,6,'Nama Pemasok',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Harga',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
       $laporan = $this->db->query("SELECT * FROM tb_pembelian WHERE tgl_pembelian BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl' AND status_pembelian='Selesai'")->result();        
       foreach ($laporan as $row){
        $pdf->Cell(10,6,$no++,1,0);
        $pdf->Cell(30,6,$row->kode_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->tgl_pembelian,1,0,'C');
        $pdf->Cell(25,6,$row->kode_brg,1,0,'C');
        $pdf->Cell(50,6,$row->nama_brg,1,0,'C');
        $pdf->Cell(30,6,$row->jml_brg,1,0,'C');
        $pdf->Cell(30,6,$row->hrg_brg,1,0,'C');
        $pdf->Cell(30,6,$row->nama_pengguna,1,0,'C');
        $pdf->Cell(30,6,$row->jml_hrg,1,1,'C');
        }
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(jml_hrg) as total FROM tb_pembelian WHERE tgl_pembelian BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl' AND status_pembelian='Selesai'")->result();
        $totalHarga2 = 0;
        foreach ($jumlah as $jml){

            $totalHarga2 = $jml->total;
        }
        $pdf->Cell(35,6,' Total Pengeluaran =',2,0);
        $pdf->cell(30,6,$totalHarga2,2,1);
        $pdf->SetFont('Arial','B',10,);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->Cell(30,5,' ',2,1);
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(hrg_total) as total FROM tb_transaksi INNER JOIN tb_detailtrx ON tb_transaksi.kode_trx=tb_detailtrx.kode_trx  WHERE tgl_trx BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl'")->result();
        $totalHarga1 = 0;
        foreach ($jumlah as $jml){

            $totalHarga1 = $jml->total;
        }
        $pdf->Cell(60,6,'TOTAL SALDO PENDAPATAN',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga1,2,0);  
        $pdf->SetFont('Arial','B',10);
        $jumlah= $this->db->query("SELECT SUM(jml_hrg) as total FROM tb_pembelian WHERE tgl_pembelian BETWEEN '$datalaporan->dari_tgl' AND '$datalaporan->sampai_tgl' AND status_pembelian='Selesai'")->result();
        $totalHarga2 = 0;
        foreach ($jumlah as $jml){

            $totalHarga2 = $jml->total;
        }
        $pdf->Cell(10,6,' - ',2,0);
        $pdf->cell(20,6,$totalHarga2,2,1);
        $pdf->SetFont('Arial','B',10);
        $totalHarga = 0;
        foreach ($jumlah as $jml){
            $totalHarga = $jml->total;
        }
        $pdf->Cell(60,6,'',2,0);
        $pdf->Cell(10,6,'=',2,0);
        $pdf->cell(20,6,$totalHarga1 - $totalHarga2,2,0);
        $pdf->Output();
        
    
}
}
}
