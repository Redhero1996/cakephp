<?php

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
			echo "<td>".$item['Book']['title']."</td>";
			echo "<td>".$item['Book']['description']."</td>";
			echo "</tr>";
		}

		
	}