<?php
class Booking_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('m_booking');
        $this->objek=$this->CI->m_booking;
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
        $totalrow= $this->objek->getTotalRow('Honda Beat 2012', 'Susah distater', '2017-09-15');
        $this->request('POST', 'booking/createBooking',
            [
                'jenisKendaraan' => 'Honda Beat 2012',
                'keluhan' => 'Susah distater',
                'tanggalBook' => '2017-09-15'
            ]);
        $totalrowafter= $this->objek->getTotalRow('Honda Beat 2012', 'Susah distater', '2017-09-15');
        $this->assertEquals($totalrowafter,$totalrow+1);
        $this->request('GET', 'booking/deleteLastBooking');
    }
    //jenis kendaraan tidak diisi
    function test_createBooking_gagal(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $totalrow= $this->objek->getTotalRow(NULL, 'Susah distater', '2017-09-15');
        $this->request('POST', 'booking/createBooking',
            [
                'jenisKendaraan' => NULL,
                'keluhan' => 'Susah distater',
                'tanggalBook' => '2017-09-15'
            ]);
        $totalrowafter= $this->objek->getTotalRow(NULL, 'Susah distater', '2017-09-15');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
    //jenis keluhan null
    function test_createBooking_gagal2(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $totalrow= $this->objek->getTotalRow('Honda Beat 2012', NULL, '2017-09-15');
        $this->request('POST', 'booking/createBooking',
            [
                'jenisKendaraan' => 'Honda Beat 2012',
                'keluhan' =>  NULL,
                'tanggalBook' => '2017-09-15'
            ]);
        $totalrowafter= $this->objek->getTotalRow('Honda Beat 2012',  NULL, '2017-09-15');
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
    //tanggal tidak diisi
    function test_createBooking_gagal3(){
        $_SESSION['name'] = "palupisekarh@gmail.com";
        $totalrow= $this->objek->getTotalRow('Honda Beat 2012', 'Susah distater', NULL);
        $this->request('POST', 'booking/createBooking',
            [
                'jenisKendaraan' => 'Honda Beat 2012',
                'keluhan' => 'Susah distater',
                'tanggalBook' => NULL
            ]);
        $totalrowafter= $this->objek->getTotalRow('Honda Beat 2012',  'Susah distater', NULL);
        $this->assertEquals($totalrowafter,$totalrow);
        $this->assertRedirect('welcome');
    }
}