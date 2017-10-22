<?php

class Booking extends CI_Controller{

    function __construct(){
    parent::__construct();
    $this->load->model('m_booking');
    $this->load->helper(array('form', 'url'));
    }

    function viewBooking()
    {
      $this->load->view('page/head');
      $this->load->view('page/navbar');
      $this->load->view('v_booking');
      $this->load->view('page/footer');
    }

    function berhasilbook()
    {
      $this->load->view('page/head');
      $this->load->view('page/navbar');
      $this->load->view('v_suksesb');
    }

    public function createBooking(){
        $username = $this->session->userdata('name');
        $jenisKendaraan = $this->input->post('jenisKendaraan');
        $keluhan = $this->input->post('keluhan');
        $tanggalBook =  $this->input->post('tanggalBook');
        $data = array(
            'name' => $username,
            'jenisKendaraan' => $jenisKendaraan,
            'keluhan' => $keluhan,
            'tanggalBook' => $tanggalBook
        );
      if($username == null || $jenisKendaraan == null || $keluhan==null || $tanggalBook==null){
        redirect('welcome');
      }else{
        $this->m_booking->addData($data);
        redirect('booking/berhasilbook');}}
          
    public function deleteLastBooking(){ 
        $lastBooking = $this->m_booking->getLastRow();
        $this->m_booking->deleteBooking($lastBooking[0]);      
    }

}
?>