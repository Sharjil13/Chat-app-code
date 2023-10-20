<?php
    $conn =mysqli_connect("localhost" , "root" , "" , "chat");
    if(!$conn){
        echo "Err" .mysqli_connect_error();
    }
?>