<?php echo $this->Form->create('Book');?>
       <fieldset>
          <legend>Add New Book</legend>
          <?php
             echo $this->Form->hidden('id');   
             echo $this->Form->input('title');
             echo $this->Form->input('description');
             echo $this->Form->input('isbn');
          ?>
       </fieldset>
<?php echo $this->Form->end('Update book');?>