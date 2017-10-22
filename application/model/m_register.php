<?php
class M_register extends CI_Model {

  function addData($data) {
      $this->db->insert('customer', $data);
  }

  function deleteUser($data){
    $this->db->delete('customer', $data);
  }
  
  function getLastRow(){
    $query = $this->db->query("SELECT * FROM customer ORDER BY id DESC LIMIT 1");
    $result = $query->result_array();
    return $result;
  }

  function readWhere($table, $id, $where){
     return $this->db->get_where($table, array($where => $id));
  }

}
?>