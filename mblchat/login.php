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
        <div class="form login">
            <header>Realtime Chat app</header>

            <form action="#" autocomplete="off">
                <div class="err_message">

                    <p><span></span> </p>
                </div>

                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your Email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password">
                    <i id="icon" class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Chat to continue">
                </div>
                <div class="field link">
                    <p><span>Not Yet Sing Up? <a href="index.php">SingUp Now </a></span></p>
                </div>

            </form>
        </div>
    </div>


    <script src="js/show&hide.js"></script>
    <script src="js/mainlogin.js"></script>
</body>

</html>