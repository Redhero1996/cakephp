<h1>Add Post</h1>
<?php  
	echo $this->Form->create('Valid', array('url' => 'demo01'));
	echo $this->Form->input('title');
	echo $this->Form->input('info');
	echo $this->Form->end('Register');
?>