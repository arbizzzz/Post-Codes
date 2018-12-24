<?php
$connection = mysqli_connect('localhost','root','');
if(!$connection){
    echo 'Error: Database connection Failed';
}
$db_select = mysqli_select_db($connection,'worldcom');
if(!$db_select){
    echo 'Error: Cannot Select Database' . die(mysqli_error($connection));
}
?>