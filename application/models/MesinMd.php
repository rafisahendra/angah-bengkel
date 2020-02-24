<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MesinMd extends CI_Model
{
    
    private $_table = "brand";
    public $id_brand;
    public $nama_brand;
    

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_brand" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_brand = uniqid();
        $this->nama_brand = $post["nama"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_brand = $post["id"];
        $this->nama_brand = $post["nama"];
       
        return $this->db->update($this->_table, $this, array('id_brand' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_brand" => $id));
    }
}