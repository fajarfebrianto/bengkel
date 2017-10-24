<?php
class M_register extends CI_Model {

  function addData($data) {
      $this->db->insert('customer', $data);
  }

  function deleteUser($data){
    $this->db->delete('customer', $data);
  }

  function getLastRow(){
    $this->db->select('*');
    $this->db->from('customer');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function getTotalRow($username, $name, $password, $phone){
    $this->db->where('username',$username);
    $this->db->where('name', $name);
    $this->db->where('password', $password);
    $this->db->where('phone', $phone);
    $this->db->from('customer');
    $query= $this->db->get();
    return $query->num_rows();
  }

  function readWhere($table, $id, $where){
     return $this->db->get_where($table, array($where => $id));
  }
}
?>