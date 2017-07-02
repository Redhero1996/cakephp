<html>
<title></title>
<body>
<?php
if($data!=NULL){
    echo "<h2>".$data['Book']['title']."</h2>";
    echo "<h3>".$data['Book']['isbn']."</h3>";
    echo "<h4>".$data['Book']['description']."</h4>";
}
else{
    echo "<h2>Data Not Found</h2>";
}
?>
</body>
</html>