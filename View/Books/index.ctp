<html>
<body>

<?php
if($data==NULL){
    echo "<h2>Dada Empty</h2>";
}
else{
    echo "<table>
          <tr>
            <td>id</td>
            <td>Title</td>
            <td><td>
            <td><td>
          </tr>";
    foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td><a href='".$this->webroot."books/view/".$item['Book']['id']."' >".$item['Book']['title']."</a></td>";
        echo "<td><a href='".$this->webroot."books/edit/".$item['Book']['id']."' >Edit</a></td>";
        echo "<td><a href='".$this->webroot."books/del/".$item['Book']['id']."' >Del</a></td>";
        echo "</tr>";
    } 
}
?>
</body>
</html>