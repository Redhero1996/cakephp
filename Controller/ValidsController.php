<?php  
	class ValidsController extends AppController{
		public $name = "Valids";//name space mặc định khi sử dụng datavalidation(khai báo trong model)
		public $helpers = array('Html', 'Form');//sử dụng để tạo form(khai báo trong controller)
		public $components = array('Session');// sử dụng session(khai báo trong controller)

	/* Sử dụng nhiều tập luật cho 1 field
		Tạo 1 form nhập liệu với 2 field với các tập luật được mô tả :
			- title : không được phép rỗng
		    - info : không được phép rỗng	
	*/		
		function demo01(){
			$this->Valid->set($this->data);// kích hoạt tính năng validation
										  // $this->data: mảng dữ liệu được form submit
		// $this->Valid->vaild01(): được định nghĩa trong model để kiểm tra dữ liệu, kết quả TRUE thì hợp lệ, FALSE thì không hợp lệ.
		if($this->data){
			if($this->Valid->valid01()==TRUE){
				$this->Session->setFlash("Data is avaliable !");
			}else{
				$this->Session->setFlash("Data is not avaliable !");
			}
		}
	}
	


		/*Sử dụng nhiều tập luật cho 1 field
			- Yêu cầu tạo 1 form nhập dữ liệu với 3 field với các tập luật được mô tả :
			- username : không được phép rỗng
						 Tối đa là 10 kí tự
						 Ít nhất là 4 kí tự

			- email : không được phép rỗng
			 		  định dạng là email
			- website: không được phép rỗng
			 		   định dạng là địa chỉ url
		*/
	function demo02(){
		$this->Valid->set($this->data);
		if($this->Valid->valid02()==TRUE){
				$this->Session->setFlash("Data is avaliable !");
				
			}else{
				$this->Session->setFlash("Data is not avaliable !");
			}
	}

	/*Sử dụng tập luật bằng regular expression
		- Yêu cầu tạo 1 form nhập liệu với 2 field với các tập luật được mô tả :
		- username : với Regular Expression thứ 1
		- email : với Regular Expression thứ 2
	*/
	function demo03(){
		$this->Valid->set($this->data);
		if($this->Valid->valid03()==TRUE){ 
			$this->Session->setFlash("Data is avaliable !"); 
		}else{ 
			$this->Session->setFlash("Data is not avaliable !"); 
		}
	}

	/* Sử dụng chức năng callback function
		-Yêu cầu tạo 1 form nhập liệu với 1 field với các tập luật được mô tả :
		- username : Không được rỗng
		Dữ liệu nhập vào hợp lệ là chuỗi “admin” nếu không thì báo lỗi, dùng hàm checkUsername để kiểm tra tính hợp lệ đó.
	*/
	function demo04(){ 
		$this->Valid->set($this->data); 
		if($this->Valid->valid04()==TRUE){ 
			$this->Session->setFlash("Data is avaliable !"); 
		}else{ 
			$this->Session->setFlash("Data is not avaliable !"); 
		} 
	}
}
?>