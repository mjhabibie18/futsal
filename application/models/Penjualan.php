<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Model
{
  private $_table = "tb_transaksi";

    public $kode_trx;
    public $nama_brg;
    public $jml_brg;
    public $jml_hrg;
    
    public function getTotal()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function duatable() 
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_detailtrx','tb_transaksi.kode_trx=tb_detailtrx.kode_trx');
        $query = $this->db->get();
        return $query->result();
    }

    public function tabeltransaksi() 
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $query = $this->db->get();
        return $query->result();
    }

    public function kode()
    {
        $this->db->select('RIGHT(transaksi.kode_booking,2) as kode_booking');
        $this->db->order_by('kode_booking','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('transaksi');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
              $data = $query->row();      
              $kode = intval($data->kode_booking) + 1; 
          }
          else{      
              $kode = 1;  //cek jika kode belum terdapat pada table
          }
              $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
              $kodetampil = "TRX".$batas;  //format kode
              return $kodetampil;  
         }

    public function tambah_data($data_transaksi)
    {
        $this->db->trans_start();
        $id = $this->tambah_transaksi($data_transaksi);
        $data_transaksi['kode_trx'] = $id;
        $this->tgl_trx = date('Y-m-d');
        
    }
 
  public function tambah_transaksi($data)
  {
        $this->db->insert('tb_transaksi', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
  }
 
  public function tambah_detailtrx($data)
  {
        $res = $this->db->insert('tb_detailtrx', $data);
        return $res;
  }

  public function got()
  {

        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_detailtrx','tb_transaksi.kode_trx=tb_detailtrx.kode_trx');
        $this->db->where('tb_transaksi.kode_trx', 'TRX');
        $query = $this->db->get();
        return $query->result();
  }

  public function get($id = null)
  {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_detailtrx','tb_transaksi.kode_trx=tb_detailtrx.kode_trx');
        $this->db->where('tb_transaksi.kode_trx', $id);
        if($id != null) {
        }
        $query = $this->db->get();
        return $query;
  }

 
  public function edit($post) 
  {
        $params = [
        'kode_trx' => $post['kode_trx'],
        'tgl_trx' => $post['tgl_trx'],
        'jml_hrg' => $post['jml_hrg'],
        ];

        $data_detailtrx = [
        'kode_trx' => $post['kode_trx'],
        'kode_brg' => $post['kode_brg'],
        'nama_brg' => $post['nama_brg'],
        'ukuran_brg' => $post['ukuran_brg'],
        'hrg_brg' => $post['hrg_brg'],
        'jml_brg' => $post['jml_brg'],
        'hrg_total' => $post['hrg_total'],
         ];
        $this->db->where('kode_trx',$post['kode_trx']);
        $this->db->update('tb_transaksi', $params);
         $this->db->where('kode_trx',$post['kode_trx']);
        $this->db->update('tb_detailtrx', $data_detailtrx);
    }
    
   
    public function hapus($id)
    {
        $this->db->where('kode_trx', $id);
        $this->db->delete('tb_transaksi');
        $this->db->where('kode_trx', $id);
        $this->db->delete('tb_detailtrx');
    }

    public function get_data_detail($kode_trx){
        $hsl=$this->db->query("SELECT * FROM tb_detailtrx WHERE kode_trx='$kode_trx'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kode_trx' => $data->kode_trx,
                    'kode_brg' => $data->kode_brg,
                    'nama_brg' => $data->nama_brg,
                    'ukuran_brg' => $data->ukuran_brg,
                    'hrg_brg' => $data->hrg_brg,
                    'jml_brg' => $data->jml_brg,
                    'hrg_total' => $data->hrg_total,
                    );
            }
        }
        return $hasil;
    }

    public function get_data_barang_bykode($kode_brg){
        $hsl=$this->db->query("SELECT * FROM tb_barang WHERE kode_brg='$kode_brg'");
        if($hsl->num_rows()>0){
            $stk=$this->db->query("SELECT * FROM tb_barang WHERE kode_brg='$kode_brg' AND stok_brg > 0");
            if($stk->num_rows()>0) {
              foreach ($hsl->result() as $data) {
                $hasil=array(
                  'pesan' => 'sukses',
                  'kode_brg' => $data->kode_brg,
                  'nama_brg' => $data->nama_brg,
                  'ukuran_brg' => $data->ukuran_brg,
                  'hrg_jual' => $data->hrg_jual,
                );
              }
            } else {
              $hasil=array(
                'pesan' => 'stok habis',
              );
            }
        } else {
          $hasil=array(
            'pesan' => 'data kosong',
          );
        }
        return $hasil;
    }

    public function tampil_data(){
    $this->db->select('*');
    $this->db->from('tb_detailtrx');
    $query = $this->db->get();
    if($query->num_rows()>0){
    return $query->result();
    }
    }

    public function insert_data($data){
    $this->db->insert('tb_detailtrx', $data);
    if($this->db->affected_rows() > 0){
    return true;
    }
    
}
    public function barang_list(){
    $hasil=$this->db->query(" SELECT * FROM tb_detailtrx where kode_trx = (SELECT max(kode_trx) FROM tb_detailtrx)");
    return $hasil->result();
  }
}
