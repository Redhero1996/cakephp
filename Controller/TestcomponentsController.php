<?php
	class TestcomponentsController extends AppController{
    public $components = array('Data');
    function test01(){
       $data = $this->Data->randd(6);//Sử dụng function randd(6),randdom 6 số
       $this->set("data",$data);
    }

    function test_component(){ 
    	$string = "Diễn đàn QHonline . Nơi khơi nguồn các mã nguồn mở "; // chuỗi ban đầu 
    	$data = $this->Data->unicode_convert($string); // dữ liệu sau khi chuyển đổi không dấu 
    	$this->set("data",$data); // gán dữ liệu để hiển thị bên view 
    }
}