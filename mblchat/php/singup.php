<?php
session_start();
include_once("configration.php");
$fname = mysqli_real_escape_string($conn, $_POST['first_name']);
$lname = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Cheak email exist or not
        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - Alreadt Exist";

        } else {
            //Cheak user upload file
            if (isset($_FILES['image'])) { //if file uploaded
                $img_name = $_FILES['image']['name']; //User upload img naem
                $img_type = $_FILES['image']['type']; //user upload image type
                $tmp_name = $_FILES['image']['tmp_name']; //tempreary name used to save file in our folder

                //explode img to get img last extension
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //Here we got extension

                $extensions = ['png', 'jpg', 'jpej']; //Valid image extensions 
                // store in array
                if (in_array($img_ext, $extensions) == true) {
                    //Extension matched
                    $time = time(); //get current time
                    //user to rename user img with current time ....So it will be unique
                    //store user image in our folder
                    $new_image_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_image_name)) { //user upload img and move to folder successfully

                        $random_id = rand($time, 10000000); //Creat rendom id for user
                        $status = "Active now";
                        //insert user data with query
                        $sql2 = mysqli_query($conn, "INSERT INTO `users` (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");


                        if ($sql2) { //if data inserted

                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION["unique_id"] = $row["unique_id"];
                                //With this section we use user unique id inmother php file
                                echo "success";
                            }

                        } else {
                            echo "something wrong";
                        }
                    }

                } else {
                    echo 'Please select valid image';
                }


            } else {
                echo 'Please select a file';
            }
        }

    } else {
        echo "$email - This is not a valid email";
    }

} else {
    echo "All fields are required";
}
?>