<?php
class Book extends AppModel{
    var $name = "Book"; // Ten cua Model Book
    var $validate = array(
                            'title' => array(
                                            'rule2' => array(
                                                                'rule' => 'checkTitle',
                                                                'message' => "Title has been exit",
                                                            ),
                                            'rule1' => array(
                                                                'rule' => 'notEmpty', //VALID_NOT_EMPTY,
                                                                'message' => "Title can not Empty",
                                                            ),
                                        ),
                            'description' => array(
                                                    'rule' => 'notEmpty',
                                                    'message' => "Discrition can not Empty",
                                                    ),
                            'isbn' => array(
                                                'rule' => 'notEmpty',
                                                'mesage' => 'Isbn can not empty',
                                            ),
                        );
    
    //------- Check title 
    function checkTitle(){
        if(isset($this->data['Book']['id'])){
            $where = array(
                            "id !=" => $this->data['Book']['id'],
                            "title" => $this->data['Book']['title'],
                            );        
        }
        else{
            $where = array(
                            "title" => $this->data['Book']['title'],
                            );   
        } 
        $this->find($where);
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }
        else{
            return true;
        }
    }
}