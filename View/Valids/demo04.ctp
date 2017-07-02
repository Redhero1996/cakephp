<h1>Add Post</h1> 
<?php 
	echo $this->Form->create('Valid', array('url' => 'demo04')); 
	echo $this->Form->input('username'); 
	echo $this->Form->end('Check'); 
?>