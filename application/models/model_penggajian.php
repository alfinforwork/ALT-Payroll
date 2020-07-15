<?php 
 
class Model_penggajian extends CI_Model{  
   private $_table = "tb_penggajian";
    

    function __construct() {
        parent::__construct();
    }


    public function insert_data($data){
        $this->db->insert($this->_table, $data);
    }

    public function edit_Data($data){
        $this->db->set($data);
        $this->db->update($this->_table, $this, array('id_penggajian' => $data['id_penggajian']));
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_penggajian" => $id])->row();
    }

   

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nip" => $id));
    }
}