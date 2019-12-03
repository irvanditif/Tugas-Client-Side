<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model{  

    private $_table = "penerbit";

    function tampil_data()
    {
        return $this->db->query("select * from penerbit");
    }
    
    function tambah($data)
    {
        $this->db->insert('penerbit',$data);
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idpenerbit" => $id])->row();
    }

    public function update($data)
    {
        $this->db->where('idpenerbit',$_POST['idpenerbit']);
        $this->db->update('penerbit',$data);
    }

   function hapus($id)
    {
        $this->db->where('idpenerbit',$id);
        $this->db->delete('penerbit');

    }
}
