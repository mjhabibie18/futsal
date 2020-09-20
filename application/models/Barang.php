<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Model
{
    private $_table = "tb_barang";

    public $kode_brg;
    public $nama_brg;
    public $kategori_brg;
    public $hrg_jual;
    public $hrg_beli;
    public $stok_brg;
    public $nama_pemasok;

   public function data($number, $offset){
    return $query = $this->db->get('tb_barang',$number,$offset)->result();
   }

   public function jumlah_data(){
    return $this->db->get('tb_barang')->num_rows();
   }

    public function getTotal()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_barang_kosong(){
      
      $query=$this->db->query("SELECT * FROM tb_barang WHERE stok_brg <= 10");
      return $query->result();
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

    public function tampil_data()
    {
        $query = $this->db->get('tb_kategori');
        return $query;
    }

     public function tampil_pengguna()
    {
       $query=$this->db->query("SELECT * FROM tb_pengguna WHERE status = 'Pemasok'");
      return $query;
    }

    public function tampil()   {    
            return $this->db->get('tb_barang')->result();
        }

    public function kode(){
          $this->db->select('RIGHT(tb_barang.kode_brg,2) as kode_brg');
          $this->db->order_by('kode_brg','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('tb_barang');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode = intval($data->kode_brg) + 1; 
          }
          else{      
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "BR".$batas;  //format kode
              return $kodetampil;  
         }

    public function add($post)
    {

        $post = $this->input->post();
        $this->kode_brg = $post["kode_brg"];
        $this->nama_brg = $post["nama_brg"];
        $this->kategori_brg = $post["kategori_brg"];
        $this->ukuran_brg = $post["ukuran_brg"];
        $this->hrg_jual = $post["hrg_jual"];
        $this->hrg_beli = $post["hrg_beli"];
        $this->stok_brg = $post["stok_brg"];
        $this->nama_pemasok = $post["nama_pemasok"];
        
      
         $this->db->insert($this->_table,$this);
    }

     public function edit($post) {
        $params = [
            'kode_brg' => $post['kode_brg'],
            'nama_brg' => $post['nama_brg'],
            'kategori_brg' => $post['kategori_brg'],
            'ukuran_brg' => $post['ukuran_brg'],
            'hrg_jual' => $post['hrg_jual'],
            'hrg_beli' => $post['hrg_beli'],
            'stok_brg' => $post['stok_brg'],
            'nama_pemasok' => $post['nama_pemasok'],

        ];
        $this->db->where('kode_brg',$post['kode_brg']);
        $this->db->update('tb_barang', $params);
    }
   
    public function hapus($id)
    {
        $this->db->where('kode_brg', $id);
        $this->db->delete('tb_barang');
    }

    public function barang_list(){
    $hasil=$this->db->query("SELECT * FROM tb_barang");
    return $hasil->result();
  }
}