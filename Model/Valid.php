<?php  
	class valid extends AppModel{
	//chỉ thông báo có hợp lệ hay không và báo lỗi tương ứng	
		public $useTable = false; //không sử dụng bảng CSDL 
		public $validate = array();

		function valid01(){
			$this->validate = array(
				"title" => array(
							"rule" => "notBlank",// tập luật là không rỗng 
							"message" => "Please enter title!"// thông báo khi có lỗi
						),
				"info" => array(
							"rule" => "notBlank",
							"message" => "Please enter info!"
						)
			);
			//nếu dữ liệu đã được validate (hợp lệ)
			if($this->validates($this->validate))//hàm kiểm tra các tập luật
				return TRUE; 
			else return FALSE;
		}

	function valid02(){
		$this->validate = array(
				"username" => array(
						"rule1" => array(
								"rule" => "notBlank",
								"message" => "Username can not empty"
						),
						"rule2" => array(
								"rule" => array('minLength', 4),
								"message" => "Username must be at least 4 characters long"
						),
						"rule3" => array(
								"rule" => array('maxLength', 10),
								"message" => "Usernames must be no larger than 10 characters long"
						)
				),
				"email" => array(
						"rule1" => array(
							    "rule" => "notBlank",
							    "message" => "Please enter email"
						),
						"rule2" => array(
								"rule" => "email",
								"message" => "Email not avalible!",
						)
				),
				"website" => array(
						"rule1" => array(
								"rule" => "notBlank",
								"message" => "Please enter website!"
						),
						"rule2" => array(
								"rule" => "url",
								"message" => "Website is not avalible!"
						)
				)
		);
		if($this->validates($this->validate)) 
			return true;
		else return false;
	}

	function valid03(){ 
		$this->validate = array( 
				"username" => array( 
						'rule' => '/^[a-z0-9]{4,10}$/i', 
						'message' => 'Username must be integer and alphabet, between 4-10 characters', ), 
				"email" => array( 
						'rule' => '/^[a-z A-Z]{1}[a-z A-Z 0-9_]+\@[a-z A-Z 0-9]{2,}\.[a-z A-Z]{2,}$/i',
						 'message' => 'email not avaliable', 
						 ), 
			); 
		if($this->validates($this->validate)) 
			return TRUE; 
		else return FALSE; 
	}	

	//------ Valid with call back function 
	function valid04 (){ 
		$this->validate = array( 
				"username" => array( 
						'rule' => 'checkUsername', 
						'message' => 'Username is not avaliable', 
						), 
				); 
		if($this->validates($this->validate)) 
			return TRUE; 
		else return FALSE; 
	}
	//-------- Check Useranme
	function checkUsername(){ 
		// so sánh dữ liệu nhập từ form có tên username
		if($this->data['Valid']['username']=="admin"){  return true; 
		} else{ 
			return false; 
		} 
	}
}
?>