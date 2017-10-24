<?php

class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_register');
        $this->load->helper(array('form', 'url'));
    }

    function viewreg(){
        $this->load->view('page/head');
        $this->load->view('page/navbar');
        $this->load->view('v_register');
        $this->load->view('page/footer');
    }

    function success(){
        $this->load->view('page/head');
        $this->load->view('page/navbar');
        $this->load->view('success');
        $this->load->view('page/footer');
    }

    public function create(){
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $password = md5($this->input->post('password'));
        $phone =  $this->input->post('phone');
        $cek_user = $this->m_register->readWhere('customer', $username, 'username')->num_rows(); 

        if($cek_user>0){
            echo "email sudah pernah terdaftar. gunakan email yang lain";
        }
        else{
            $data = array(
            'username' => $username,
            'name' => $name,
            'password' => $password,
            'phone' => $phone
            );
           
                if($username == null || $name == null || $password==md5(NULL) || $phone==null){
                    redirect('welcome');
                }
                else{
                    $this->m_register->addData($data);
                    redirect('register/success');
               }
        }
    }

    public function deleteLastUser(){ 
       $lastuser = $this->m_register->getLastRow();
       $this->m_register->deleteUser($lastuser[0]);
    }
}
?>