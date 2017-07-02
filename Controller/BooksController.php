<?php
class BooksController extends  AppController{
    var $name = "Books";// ten cua Controller Book
    var $helpers = array('Form','Paginator','Html');
    var $components = array('Session','RequestHandler');
    var $paginate = array();

    function test(){
        echo $this->Common->unicode_convert("Hero Gustin");
    }

    function index(){
        $data = $this->Book->find("all");
        $this->set("data",$data);// gán giá trị mảng data vào biến data và hiển thị chúng ra view
    }
    
    //------- Paging Normal 
    function paging(){
        $this->paginate = array(
                                'limit' => 4,
                                'order' => array('title' => 'desc'),
                             );
        $data = $this->paginate("Book");
        $this->set("data",$data);
    }
     
    //-------------------
    function exam01(){
        $data = $this->Book->find("all");
        $this->set("data",$data);
    }
    
    function exam02(){
        $sql = array(
                        "conditions"=> array(
                                                "title LIKE"=> "%PHP%",
                                                "id !=" => 4
                                            ),
                        "limit" => "0,2",
                    );
        $data = $this->Book->find("all",$sql);
        $this->set("data",$data);
    }
    
    function exam03(){
        $sql = "Select * From books";
        $data = $this->Book->query($sql);
        $this->set("data",$data); 
    }
    
    //-------------- View detail item
    function view($id=NULL){
            $info = $this->Book->read(null,$id);
            $this->set("data",$info);
            $this->render("detail_view");
    }
    
    //--------------- Add item
    function add() {
        if(!empty($this->data)){
            if ($this->Book->save($this->data)){
                $this->Session->setFlash('The Book has been saved');
                $this->redirect(array('action'=>'index'));
            }
        }
        $this->render("add_view");
    }
    
    //----------------- Edit Item
     function edit($id=null) {
          if (!$id && empty($this->data)) {
             $this->Session->setFlash('Invalid Book');
             $this->redirect(array('action'=>'index'));
          }             
          if (empty($this->data)) {
             $this->data = $this->Book->read(null, $id);
          }
          else {
             if($this->Book->save($this->data)) {
                $this->Session->setFlash('Book is Updated!', true);
                $this->redirect(array('action'=>'index'), null, true);
             }
          }
          $this->render("edit_view");
       }
    
    //----------------- del Item
    function del($id=null){
        if(is_numeric($id)&&$id!=""){
            if($this->Book->delete($id)){
                $this->Session->setFlash('The book with id: <b>' . $id . '</b> has been deleted.');
                $this->redirect(array('action' => 'index'));
            } 
        }
        else{
            $this->Session->setFlash('The book with id: <b>' . $id . '</b> not avaliable.');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    //--- GetData
    function getdata(){
        return $this->Book->find("all");
    }
    //--- Request Action
    function element(){
        
    }
    
    /**
     * Searching and Paging 
     * Url = http://mrphp.com.au/code/search-forms-cakephp
     * Complex Find Conditions : http://book.cakephp.org/view/1030/Complex-Find-Conditions
     */ 
    //nhận request từ form và chuyển dữ liệu lại cho result()
    function search() {
		// the page we will redirect to
		$url['action'] = 'result';
		// build a URL will all the search elements in it
		// the resulting URL will be 
		// example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
		foreach ($this->data as $k=>$v){ 
			foreach ($v as $kk=>$vv){ 
				$url[$k.'.'.$kk]=$vv; 
			} 
		}
		// dùng để chuyển hướng sang action url
		$this->redirect($url, null, true);
	}
    
    //hiển thị form search và hiển thị phân trang dữ liệu
    function result(){
        $conditions = array();
        $data = array();
        if(!empty($this->passedArgs)){
            //Fillter title
            if(isset($this->passedArgs['Book.title'])) { //kiểm tra xem có tồn tại title hay không
                $title = $this->passedArgs['Book.title'];
                $conditions[] = array(
                    'Book.title LIKE' => "%$title%",//điều kiện SQL
                );
                $data['Book']['title'] = $title;//cho giá trị nhập vào mảng data
            }
            //Fillter description
            if(isset($this->passedArgs['Book.description'])) {
    			$keywords = $this->passedArgs['Book.description'];
    			$conditions[] = array(
                    "OR" => array(
                                'Book.description LIKE' => "%$keywords%",
                                'Book.isbn LIKE' => "%$keywords%" 
                            )
    			);
                $data['Book']['description'] = $keywords; 
            }
            //Limit and Order By
            $this->paginate= array(
                'limit' => 4,
                'order' => array('title' => 'desc'),
            );
            
            $this->data = $data;//Giữ lại giá trị nhập vào sau khi submit
            $this->set("posts",$this->paginate("Book",$conditions));
        }
    }
}