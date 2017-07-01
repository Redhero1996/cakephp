<?php

	/*echo $html->link('Example 01', 
			array(
				'controller'=>'books',
				'action'=>'index',
				'slug'=> Inflector::slug('Example 01'
					)));*/

	if($data == NULL){
		echo "<h2> Data empty </h2>";
	}else{
		echo "<table>
			<caption>Bảng kết quả</caption>
				<tr>
					<td>Id</td>
					<td>Title</td>
					<td>Description</td>
				</tr>";

		foreach ($data as  $item) {
			echo "<tr>";
			echo "<td>".$item['Book']['id']."</td>";
			echo "<td><a href = 'books/view/".$item['Book']['id']." ' >".$item['Book']['title']."</a></td>";
			echo "<td>".$item['Book']['description']."</td>";
			echo "</tr>";
		}
	}