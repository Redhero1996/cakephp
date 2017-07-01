<?php 
	//Shows the previous links
		echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); 
	//Shows the page numbers
	 	echo " | ".$this->Paginator->numbers()." | ";  
	//Shows the next links	
	 	echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); 
	// hiển thị X of Y, where X is current page and Y is number of pages
		echo " Page ".$this->Paginator->counter();
	 	/*echo " Page ".$this->Paginator->counter("Trang {:page}/ {:pages}, hiển thị {:current} quyển sách trong tổng số {:count} quyển");  */
	 	
?> 

<?php 
	if($data==NULL){ 
		echo "<h2>Dada Empty</h2>"; 
		} else{ 
			echo "<table> 
					<tr> 
						<td>id</td> 
						<td>Title</td> 
					</tr>"; 
			foreach($data as $item){ 
				echo "<tr>"; 
				echo "<td>".$item['Book']['id']."</td>";
				echo "<td><a href='".$this->webroot."books/view/".$item['Book']['id']."' >".$item['Book']['title']."</a></td>"; 
				echo "</tr>"; 
			}
		}