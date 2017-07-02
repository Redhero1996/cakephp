<?php 
    $this->Paginator->options(array('url' => $this->passedArgs));
?>
<?php echo $this->Form->create('Book',array('url'=>'search'));?>
	<fieldset>
 		<legend><?php __('Book Search');?></legend>
	<?php
	    echo $this->Form->input('title');
        echo $this->Form->input('description');
		echo $this->Form->submit('Search');
	?>
	</fieldset>
<?php echo $this->Form->end();?>

<?php
// Hiển thị dữ liệu sau khi tìm kiếm
if(!empty($posts)){
    echo "<table>";
    echo "<tr>";
    echo "<th>".$this->Paginator->sort("Id","id"); //$this->Paginator->sort("tên hiểu thị","tên_field")
    echo "<th>".$this->Paginator->sort("Title","title");
    echo "<th>".$this->Paginator->sort("Description","description");
    echo "</tr>";
    
    foreach($posts as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td>".$item['Book']['title']."</td>";
        echo "<td>".$item['Book']['description']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    //---- Paging 
	echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
    
    echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
	
    echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
    
    echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
}
?>