<?php
class M_booking extends CI_Model {

  function addData($dataBooking) {
      $this->db->insert('booking', $dataBooking);
  }

  function deleteBooking($dataBooking){
    $this->db->delete('booking', $dataBooking);
  }
  
  function getLastRow(){
    $query = $this->db->query("SELECT * FROM booking ORDER BY idBooking DESC LIMIT 1");
    $result = $query->result_array();
    return $result;
  }
}
?>