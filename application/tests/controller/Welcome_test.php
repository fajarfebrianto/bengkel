<?php
class Welcome_test extends TestCase{
    public function setUp(){
        $this->resetInstance();
    }
        
    function test_index(){
            $output = $this->request('GET', 'welcome/index');
            $this->assertContains('<h5>Ir. Prof. Dody Setiawan </h5>', $output);
    }
    
}