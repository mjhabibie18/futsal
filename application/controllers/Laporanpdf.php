<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,7,'Id Laporan =',2,0,'L');
        $pdf->Cell(190,7,'Id Laporan =',0,1,'L');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(27,6,'NO HP',1,1);
        $pdf->SetFont('Arial','',10);
        $laporan = $this->db->get('tb_laporan')->result();
        foreach ($laporan as $row){
            $pdf->Cell(20,6,$row->id_laporan,1,0);
            $pdf->Cell(85,6,$row->dari_tgl,1,0);
            $pdf->Cell(27,6,$row->sampai_tgl,1,0);
            $pdf->Cell(27,6,$row->jenis_laporan,1,1);
        }
        $pdf->Output();
    }
}