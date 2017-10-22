<?php
class Booking_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
    }

    function test_viewBooking(){
        $output = $this->request('GET', 'booking/viewBooking');
        $this->assertContains('<h2 class="text-uppercase">Book The Date</h2>', $output);
    }
    
    function test_berhasilbook(){
        $output = $this->request('GET', 'booking/berhasilbook');
        $this->assertContains('<h1>Booking Sukses</h1>', $output);
    }
        
    function test_createBooking_sukses(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $this->request('POST', 'booking/createBooking',
            [
                'name' => $_SESSION['name'],
                'jenisKendaraan' => 'Honda Beat 2012',
                'keluhan' => 'Susah distater',
                'tanggalBook' => '2017-09-15'
            ]);
        $this->assertRedirect('booking/berhasilbook');
        $this->request('GET', 'booking/deleteLastBooking');
    }
    //session null(belum masuk)
    function test_createBooking_gagal(){
        $_SESSION['name'] = "";
        $this->request('POST', 'booking/createBooking',
            [
                'name' => $_SESSION['name'],
                'jenisKendaraan' => 'Honda Beat 2012',
                'keluhan' => 'Susah distater',
                'tanggalBook' => '2017-09-15'
            ]);
        $this->assertRedirect('welcome');
    }
    //jenis kendaraan tidak diisi
    function test_createBooking_gagal2(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $this->request('POST', 'booking/createBooking',
            [
                'name' => $_SESSION['name'],
                'jenisKendaraan' => NULL,
                'keluhan' => 'Susah distater',
                'tanggalBook' => '2017-09-15'
            ]);
        $this->assertRedirect('welcome');
    }
    //keluhan tidak diisi
    function test_createBooking_gagal3(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $this->request('POST', 'booking/createBooking',
            [
                'name' => $_SESSION['name'],
                'jenisKendaraan' => 'Honda Beat',
                'keluhan' => NULL,
                'tanggalBook' => '2017-09-15'
            ]);
        $this->assertRedirect('welcome');
    }
    //tanggal tidak diisi
    function test_createBooking_gagal4(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $this->request('POST', 'booking/createBooking',
            [
                'name' => $_SESSION['name'],
                'jenisKendaraan' => 'Honda Beat',
                'keluhan' => 'Susah distater',
                'tanggalBook' => NULL
            ]);
        $this->assertRedirect('welcome');
    }
}