<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Model
{

	private $_table = "tb_laporan";

    public $id_laporan;
    public $dari_tgl;
    public $sampai_tgl;
    public $jenis_laporan;


    
    public function datalaporanpembelian()
    {
    	$query=$this->db->query("SELECT * FROM tb_laporan WHERE jenis_laporan = 'Laporan Pembelian'");
      return $query->result();
	}

	public function laporanaruskas()
    {
    	 $query=$this->db->query("SELECT * FROM tb_laporan WHERE jenis_laporan = 'Laporan Arus Kas'");
      return $query->result();
	}

   public function laporanpendapatan()
    {
       $query=$this->db->query("SELECT * FROM tb_laporan WHERE jenis_laporan = 'Laporan Pendapatan'");
      return $query->result();
  }

	 public function datalaporanpenjualan()
    {
    	 $query=$this->db->query("SELECT * FROM tb_laporan WHERE jenis_laporan = 'Laporan Penjualan'");
      return $query->result();
	}

    public function add($post)
  {
        $post = $this->input->post();
        $this->id_laporan = $post["id_laporan"];
        $this->dari_tgl = $post["dari_tgl"];
        $this->sampai_tgl = $post["sampai_tgl"];
        $this->jenis_laporan = $post["jenis_laporan"];
        $this->db->insert($this->_table,$this);
        $this->dari_tgl = date('Y-m-d');
        $this->sampai_tgl = date('Y-m-d');
    }

    
  public function getbykode($id = null)
    {
        $this->db->from('tb_laporan');
        if($id != null) {
            $this->db->where('id_laporan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

     public function kodepenjualan(){
        $this->db->select('RIGHT(tb_laporan.id_laporan,2) as id_laporan');
        $this->db->order_by('id_laporan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_laporan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_laporan) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "LPJ".$batas;  //format kode
              return $kodetampil;  
        }

         public function kodependapatan(){
        $this->db->select('RIGHT(tb_laporan.id_laporan,2) as id_laporan');
        $this->db->order_by('id_laporan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_laporan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_laporan) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "LP".$batas;  //format kode
              return $kodetampil;  
        }

         public function kodepembelian(){
        $this->db->select('RIGHT(tb_laporan.id_laporan,2) as id_laporan');
        $this->db->order_by('id_laporan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_laporan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_laporan) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "LPB".$batas;  //format kode
              return $kodetampil;  
        }
    
     public function kodearuskas(){
        $this->db->select('RIGHT(tb_laporan.id_laporan,2) as id_laporan');
        $this->db->order_by('id_laporan','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_laporan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_laporan) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "LAK".$batas;  //format kode
              return $kodetampil;  
        }
}