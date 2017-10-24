<?php
class M_booking extends CI_Model {

  function addData($dataBooking) {
      $this->db->insert('booking', $dataBooking);
  }

  function deleteBooking($dataBooking){
    $this->db->delete('booking', $dataBooking);
  }
 
  public function getTotalRow($jenisKendaraan, $keluhan, $tanggalBook){
    $this->db->where('jenisKendaraan', $jenisKendaraan);
    $this->db->where('keluhan', $keluhan);
    $this->db->where('tanggalBook', $tanggalBook);
    $this->db->from('booking');
    $query= $this->db->get();
    return $query->num_rows();
  }
  
  function getLastRow(){
    $this->db->select('*');
    $this->db->from('booking');
    $this->db->order_by('idBooking', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }
}
?>