<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model
{
    private $_table = "tb_pengguna";

    public $id;
    public $username;
    public $nama_pengguna;
    public $password;
    public $alamat;
    public $no_telp;
    public $email;
    public $status;
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get($id = null)
    {
        $this->db->from('tb_pengguna');
        if($id != null) {
            $this->db->where('id', $id);
        }

        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {

        $post = $this->input->post();
        $this->id = $post['id'];
        $this->username = $post["username"];
        $this->nama_pengguna = $post["nama_pengguna"];
        $this->password = $post["password"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->email = $post["email"];
        $this->status = $post["status"];
        
      
         $this->db->insert($this->_table,$this);
    }

     public function edit($post) {
        $params = [
            'id' => $post['id'],
            'username' => $post['username'],
            'nama_pengguna' => $post['nama_pengguna'],
            'password' => $post['password'],
            'alamat' => $post['alamat'],
            'no_telp' => $post['no_telp'],
            'email' => $post['email'],
            'status' => $post['status'],
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('tb_pengguna', $params);
    }


     public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pengguna');
    }
 }