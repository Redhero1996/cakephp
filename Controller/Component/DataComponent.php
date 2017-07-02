<?php
	class DataComponent extends Object{
		//called before Controller::beforeFilter() 
		function initialize(&$controller, $settings = array()) { 
		// saving the controller reference for later use 
			$this->controller =& $controller; 
		} 
		//called after Controller::beforeFilter()
		function startup(&$controller) { } 
		//called after Controller::beforeRender() 
		function beforeRender(&$controller) { } 
		//called after Controller::render() 
		function shutdown(&$controller) { } 
		//called before Controller::redirect() 
		function beforeRedirect(&$controller, $url, $status=null, $exit=true) { } 
		function redirectSomewhere($value) { 
			// utilizing a controller method 
		}
		
	    public function randd($option=12){
	      $int = rand(0,10);
	      $a_z = "01234567891";
	      $rand_letter = $a_z[$int];
	      for($i=1;$i<$option;$i++){
	         $int1 = rand(0,10);
	         $rand_letter.= $a_z[$int1];
	      }
	      return $rand_letter;
    }

    // Ham chuyen doi tieng viet sang khong dau 
    function unicode_convert($str){ 
    	if(!$str) return false; 
    	$unicode = array( 'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'), 
    					  'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'), 
    					  'd'=>array('đ'), 
    					  'D'=>array('Đ'), 
    					  'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'), 
    					  'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'), 
    					  'i'=>array('í','ì','ỉ','ĩ','ị'), 
    					  'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'), 
    					  'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'), 
    					  '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'), 
    					  'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'), 
    					  'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'), 
    					  'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'), 
    					  'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'), ); 
    	foreach($unicode as $nonUnicode=>$uni){ 
    		foreach($uni as $value) 
    			$str = str_replace($value,$nonUnicode,$str); 
    	} return $str; 
    }

}