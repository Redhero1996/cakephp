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
          </tr>";
    foreach($data as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td>".$item['Book']['title']."</td>";
        echo "</tr>";
    }
}
?>
</body>
</html>