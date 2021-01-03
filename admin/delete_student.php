<?php
    require_once('dbconn.php');
    $id =  base64_decode($_GET['id']) ;
    $sql_delete = "DELETE FROM `student` WHERE id='$id' ";
    mysqli_query($link,$sql_delete);
     header('location:index.php?page=all-student');

?>