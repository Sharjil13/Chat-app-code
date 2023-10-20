<?php
session_start();
if (isset($_SESSION["unique_id"])) {
    header("location: users.php");
}
?>

<?php
include_once("_header.php");

?>

<body>

    <div class="singup_container">
        <div class="form singup">
            <header>Realtime Chat app</header>

            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="err_message">

                    <p><span></span> </p>
                </div>
                <div class="full_name">

                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter First name">
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Last name">
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter new Password">
                    <i id="icon" class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Chose Image</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Chat to continue">
                </div>
                <div class="field link">
                    <p><span>Already have account <a href="login.php">Login? </a></span></p>
                </div>

            </form>
        </div>
    </div>

    <script src="js/show&hide.js"></script>
    <script src="js/mainSingup.js"></script>

</body>

</html>