<?php

class Login_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
    }

    function test_aksi_login_sukses(){
        $this->assertFalse( isset($_SESSION['name']) );
        $this->request('POST', 'login/aksi_login',
            [
                'username' => 'palupisekarh@gmail.com',
                'password' => '123123',
            ]);
        $this->assertRedirect(base_url());
        $this->assertEquals('palupisekarh@gmail.com', $_SESSION['name']);
    }
    
    //email salah pwd benar
    function test_aksi_login_gagal1(){
            $this->assertFalse( isset($_SESSION['name']) );
            $this->request('POST', 'login/aksi_login',
                [
                    'username' => 'brianuhuy@gmail.com',
                    'password' => '123123',
                ]);
            $this->assertFalse( isset($_SESSION['name']) ); 
        }
        
       //username kosong
    function test_aksi_login_gagal2(){
            $this->assertFalse( isset($_SESSION['name']) );
            $this->request('POST', 'login/aksi_login',
                [
                    'username' => '',
                    'password' => '123123',
                ]);
            $this->assertFalse( isset($_SESSION['name']) );
        }
        
        //password kosong
    function test_aksi_login_gagal3(){
        $this->assertFalse( isset($_SESSION['name']) );
        $this->request('POST', 'login/aksi_login',
            [
                'username' => 'palupisekarhapsari@gmail.com',
                'password' => '',
            ]);
        $this->assertFalse( isset($_SESSION['name']) );
    }
    
    //password salah
    function test_aksi_login_gagal4(){
        $this->assertFalse( isset($_SESSION['name']) );
        $this->request('POST', 'login/aksi_login',
            [
                'username' => 'palupisekarhapsari@gmail.com',
                'password' => 'unmatch',
            ]);
        $this->assertFalse( isset($_SESSION['name']) );
    }
    
    //log out
    function test_logout(){
            $this->assertFalse( isset($_SESSION['name']) );
            $this->request('GET', 'login/logout');
            $this->assertFalse( isset($_SESSION['name']) );
    }   
}
