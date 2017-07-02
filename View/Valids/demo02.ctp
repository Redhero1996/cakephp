<h1>Add Post</h1>
<?php
	echo $this->Form->create('Valid', array('url' => 'demo02'));
	echo $this->Form->input('username');
	echo $this->Form->input('email');
	echo $this->Form->input('website');
	echo $this->Form->end('Register');