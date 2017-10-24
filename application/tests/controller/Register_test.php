<?php

class Register_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('m_register');
        $this->objek=$this->CI->m_register;
    }
    
    function test_viewreg(){
        $output = $this->request('GET', 'register/viewreg');
        $this->assertContains('<p class="lead">Belum menjadi anggota?</p>', $output);
    }

    function test_success(){
        $output = $this->request('GET', 'register/success');
        $this->assertContains('<h1>Pendaftaran Berhasil</h1>', $output);
    }
    function test_create_sukses(){
        $totalrow= $this->objek->getTotalRow('upil@gmail.com', 'upil', md5('1234567899'), '08112345678');
        $this->request('POST', 'register/create', 
                                        ['username'=>'upil@gmail.com',
                                        'name'=>'upil', 
                                        'phone'=>'08112345678',
                                        'password'=>'1234567899']);
        $totalrowafter= $this->objek->getTotalRow('upil@gmail.com', 'upil', md5('1234567899'), '08112345678');
        $this->assertEquals($totalrowafter,$totalrow+1);
        $this->request('GET', 'register/deleteLastUser');
    }
    //email yang uda ada
    public function test_create_gagal0() {
        $totalrow= $this->objek->getTotalRow('palupisekarh@gmail.com', 'unik', '1234567898', '08112345678');
        $output=$this->request('POST', 'register/create', 
                                       ['username'=>'palupisekarh@gmail.com',
                                        'name'=> 'unik', 
                                        'phone'=>'08112345678',
                                        'password'=>'1234567899']);
        $totalrowafter= $this->objek->getTotalRow('ervinachintia@gmail.com', 'unik' , '1234567899', '08112345678');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertContains("email sudah pernah terdaftar. gunakan email yang lain",$output);
    }
    //name kosong
    public function test_create_gagal1() {
        $totalrow= $this->objek->getTotalRow('ervinachintia@gmail.com', NULL , '1234567899', '08112345678');
        $this->request('POST', 'register/create', 
                                       ['username'=>'1ervinachintia@gmail.com',
                                        'name'=>NULL, 
                                        'phone'=>'08112345678',
                                        'password'=>'1234567899']);
        $totalrowafter= $this->objek->getTotalRow('ervinachintia@gmail.com', NULL , '1234567899', '08112345678');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }   
    //username kosong
    public function test_create_gagal2() {  
        $totalrow= $this->objek->getTotalRow(NULL, 'ervina', '1234567899', '08112345678');
        $this->request('POST', 'register/create', 
                                       ['username'=>NULL,
                                        'name'=> '2ervina', 
                                        'phone'=>'08112345678',
                                        'password'=>'1234567899']);
        $totalrowafter= $this->objek->getTotalRow(NULL, 'ervina', '1234567899', '08112345678');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
    //password kosong
    public function test_create_gagal3() {    
        $totalrow= $this->objek->getTotalRow( 'ervinachintia@gmail.com', 'ervina', NULL, '08112345678');
        $this->request('POST', 'register/create', 
                                       ['username'=> '3ervinachintia@gmail.com',
                                        'name'=> 'ervina', 
                                        'phone'=>'08112345678',
                                        'password'=> NULL]);
        $totalrowafter= $this->objek->getTotalRow('ervinachintia@gmail.com', 'ervina', NULL, '08112345678');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
    //phone kosong
    public function test_create_gagal4() {    
        $totalrow= $this->objek->getTotalRow( 'ervinachintia@gmail.com', 'ervina', '1234567899', NULL);
        $this->request('POST', 'register/create', 
                                       ['username'=> '4ervinachintia@gmail.com',
                                        'name'=> 'ervina', 
                                        'phone'=> NULL,
                                        'password'=> '1234567899']);
        $totalrowafter= $this->objek->getTotalRow('ervinachintia@gmail.com', 'ervina', '1234567899', NULL);
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
}