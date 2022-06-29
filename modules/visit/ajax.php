<?

if (isset($_POST['name'])) {
   
    $column = $_POST['name'];
    $newValue = $_POST['value'];    
    $id = $_POST['pk'];
    $sql = "UPDATE `people` SET $column = '$newValue' where id = $id";
    mysqli_query($link, $sql);
}


?>