<?php
session_start();
if (isset($_SESSION["unique_id"])) { //if user logged in the he ca come here other_wise go to login page
    include_once "configration.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET["logout_id"]);
    if (isset($logout_id)) {
        $status = "offline now";
        //Once user is offline we will update his status
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../users.php");
    }
} else {
    header("location: ../login.php");
}


?>