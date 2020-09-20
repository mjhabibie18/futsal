<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Model
{

	private $_table = "tb_pembelian";
    private $_pengiriman = "tb_pengiriman";
    private $_retur = "tb_retur";

    public $kode_pembelian;
    public $tgl_pembelian;
    public $kode_brg;
    public $jml_brg;
    public $hrg_brg;
    public $nama_pengguna;
    public $jml_hrg;
    public $status_pembelian;
    public $id_pengiriman;

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function lihat_retur()
    {
        return $this->db->get($this->_retur)->result();
    }

    public function get($id = null)
    {
        $this->db->from('tb_barang');
        if($id != null) {
            $this->db->where('kode_brg', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function got($id = null)
    {
        $this->db->from('tb_pembelian');
        if($id != null) {
            $this->db->where('kode_pembelian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

     public function retur($id) 
    {
        
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->where('kode_pembelian', $id);
        $query = $this->db->get();  
        return $query->result();   
    }

    public function asik($post) {
        $data = array( 
        'id_pengiriman'  =>  $_POST['id_pengiriman'] , 
        'status_pengiriman'=>  $_POST['status_pengiriman']
        );
        $this->db->insert('tb_pengiriman', $data);
    }

    public function tambah_retur($post) {
        $data = array( 
        'id_retur'  =>  $_POST['id_retur'] , 
        'kode_pembelian'=>  $_POST['kode_pembelian'],
        'tgl_retur'=>  date('Y-m-d'),
        'status_retur'=>  $_POST['status_retur']
        );
        $this->db->insert('tb_retur', $data);
    }
    public function add($post)
    {

        $post = $this->input->post();
        $this->kode_pembelian = $post["kode_pembelian"];
        $this->tgl_pembelian=date('Y-m-d');
        $this->kode_brg = $post["kode_brg"];
        $this->nama_brg = $post["nama_brg"];
        $this->jml_brg = $post["jml_brg"];
        $this->hrg_brg = $post["hrg_brg"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->jml_hrg = $post["jml_hrg"];
        $this->status_pembelian = $post["status_pembelian"];
        $this->status_penjual = $post["status_penjual"];
             
        $this->db->insert($this->_table,$this);
    }

     public function duatable($id) 
    {
        
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_pengiriman','tb_pengiriman.id_pengiriman = tb_pembelian.id_pengiriman');
        $this->db->where('tb_pembelian.id_pengiriman', $id);
        $query = $this->db->get();  
        return $query; 
    }

      public function lacak($id) 
    {  
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_pengiriman','tb_pengiriman.id_pengiriman = tb_pembelian.id_pengiriman');
        $this->db->where('tb_pembelian.id_pengiriman', $id);
        $query = $this->db->get();  
        return $query->result();   
    }

     public function cekretur($id) 
    {
        
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_retur','tb_retur.kode_pembelian = tb_pembelian.kode_pembelian');
        $this->db->where('tb_pembelian.kode_pembelian', $id);
        $query = $this->db->get();  
        return $query;    
    }

    public function returpemas($id) 
    {  
        $this->db->select('*');
         $this->db->from('tb_pembelian');
        $this->db->join('tb_retur','tb_retur.kode_pembelian = tb_pembelian.kode_pembelian');
        $this->db->where('tb_pembelian.kode_pembelian', $id);
        $query = $this->db->get();  
        return $query->result();
        
    }


    public function tampil()   {    
            return $this->db->get('tb_pembelian')->result();
        }

    public function kode(){
        $this->db->select('RIGHT(tb_pembelian.kode_pembelian,2) as kode_pembelian');
        $this->db->order_by('kode_pembelian','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_pembelian');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->kode_pembelian) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "PB".$batas;  //format kode
              return $kodetampil;  
        }

         public function kode_retur(){
        $this->db->select('RIGHT(tb_retur.id_retur,2) as id_retur');
        $this->db->order_by('id_retur','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_retur');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->id_retur) + 1; 
        }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "RP".$batas;  //format kode
              return $kodetampil;  
        }

        public function kodepengiriman(){
        $this->db->select('RIGHT(tb_pengiriman.id_pengiriman,2) as id_pengiriman');
        $this->db->order_by('id_pengiriman','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_pengiriman');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kodepr = intval($data->id_pengiriman) + 1; 
        }
          else{      
               $kodepr = 1;  //cek jika kode belum terdapat pada table
        }
              $batas = str_pad($kodepr, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "SP".$batas;  //format kode
              return $kodetampil;  
        }



    public function edit($post) {
        $params = [
            'kode_pembelian' => $post['kode_pembelian'],
            'kode_brg' => $post['kode_brg'],
            'nama_brg' => $post['nama_brg'],
            'jml_brg' => $post['jml_brg'],
            'hrg_brg' => $post['hrg_brg'],
            'nama_pengguna' => $post['nama_pengguna'],
            'jml_hrg' => $post['jml_hrg'],
            'status_pembelian' => $post['status_pembelian'],
            'status_penjual' => $post['status_penjual'],
            'id_pengiriman' => $post['id_pengiriman'],
        ];
        $this->db->where('kode_pembelian',$post['kode_pembelian']);
        $this->db->update('tb_pembelian', $params);
    }

    public function konfirmasi($post) {
        $params = [
            'id_retur' => $post['id_retur'],
            'kode_pembelian' => $post['kode_pembelian'],
            'tgl_retur' => $post['tgl_retur'],
            'status_retur' => $post['status_retur'],
        ];
        $this->db->where('kode_pembelian',$post['kode_pembelian']);
        $this->db->update('tb_retur', $params);
    }

    public function cek_pembelian()
    {
        $asik=$this->session->userdata("nama_pengguna");
        $query=$this->db->query("SELECT * FROM tb_pembelian WHERE  nama_pengguna = '$asik' AND status_pembelian='Sudah Dikonfirmasi'");
        return $query->result();   
    }

    public function cek_retur_pemasok()
    {
        $asik=$this->session->userdata("nama_pengguna");
        $query=$this->db->query("SELECT * FROM tb_pembelian INNER JOIN tb_retur on tb_pembelian.kode_pembelian=tb_retur.kode_pembelian WHERE  nama_pengguna = '$asik'");
        return $query->result();   
    }
 
     public function cek_pengiriman()
    {
      $asik=$this->session->userdata("nama_pengguna");
        $query=$this->db->query("SELECT * FROM tb_pembelian WHERE  nama_pengguna = '$asik' AND status_pembelian='Sudah Dikonfirmasi'");
        return $query->result();   
    }


     public function datapembelianpemilik()
        {
        $query=$this->db->query("SELECT * FROM tb_pembelian WHERE status_pembelian='Belum Dikonfirmasi'");
        return $query->result();
        
    }
    
     public function konfirmasipemilik($id)
    {
       $query=$this->db->query("UPDATE tb_pembelian SET status_pembelian='Sudah Dikonfirmasi' WHERE kode_pembelian= '$id'");
      return $query;
    }

     public function pesananditerima($id)
    {
       $query=$this->db->query("UPDATE tb_pembelian SET status_pembelian='Selesai' WHERE kode_pembelian= '$id'");
      return $query;
    }
}