<?php
class BooksController extends AppController{
    public $name = "Books";
    public $helpers = array('Form','Paginator','Html');
    public $paginate = array();
    
    function view(){
        $conditions = array();
        $data = array();
        if(!empty($this->passedArgs)){
            if(isset($this->passedArgs['Book.title'])) {
                $title = $this->passedArgs['Book.title']; 
                $conditions[] = array( 'Book.title LIKE' => "%$title%", ); 
                $data['Book']['title'] = $title; 
            }
            if(isset($this->passedArgs['Book.description'])) {
                $description = $this->passedArgs['Book.description']; 
                $conditions[] = array( "OR" => array( 'Book.description LIKE' => "%$description%" ) ); 
                $data['Book']['description'] = $description;
            }
            $this->paginate= array( 'limit' => 2, 'order' => array('id' => 'desc'), );
            $this->data = $data;
            $post = $this->paginate("Book",$conditions);
            $this->set("posts",$post);
        } 
    }
    function search() {
       $url['action'] = 'view';
       foreach ($this->data as $key=>$value){
          foreach ($value as $key2=>$value2){
            $url[$key.'.'.$key2]=$value2;
          }
       }
       //echo "<pre>";
       //print_r ($url); exit;
       //echo "</pre>";
       $this->redirect($url, null, true);// dùng để chuyển hướng sang action view
    }
}