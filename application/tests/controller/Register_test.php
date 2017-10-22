<?php

class Register_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
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
            $this->request('POST', 'register/create',
                [
                    'username' => 'budibudi@gmail.com',
                    'name' => 'budiono',
                    'password' => 'hehehe123',
                    'phone' => '0812345677'
                ]);
            $this->assertRedirect('register/success');
            $this->request('GET', 'register/deleteLastUser');
        }
    //name kosong
    public function test_create_gagal1() {            
        $this->request('POST','register/create',
                [
                    'username' => 'ervinachintia@gmail.com',
                    'name' => NULL,
                    'password' => 'hehehe123',
                    'phone' => '0812345677'
                ]);
       $this->assertRedirect('welcome');
    }   
    //username kosong
    public function test_create_gagal2() {            
        $this->request('POST','register/create',
                [
                    'username' => NULL,
                    'name' => 'Ervina',
                    'password' => 'hehehe123',
                    'phone' => '0812345677'
                ]);
       $this->assertRedirect('welcome');
    }
    //password kosong
    public function test_create_gagal3() {            
        $this->request('POST','register/create',
                [
                    'username' => 'ervinachintia@gmail.com',
                    'name' => 'Ervina',
                    'password' => NULL,
                    'phone' => '0812345677'
                ]);
       $this->assertRedirect('welcome');
    }
    //phone kosong
    public function test_create_gagal4() {            
        $this->request('POST','register/create',
                [
                    'username' => 'ervinachintia@gmail.com',
                    'name' => 'Ervina',
                    'password' => 'halo123',
                    'phone' => NULL
                ]);
       $this->assertRedirect('welcome');
    }

}