<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image" href="favicon.ico">
    <title>LOGIN</title>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: 2-dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='00-login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="container">
        <div class="center-content">
            <img src="dwcl_logo.png" alt="dwcl logo" class="mb-4">
            <form class="form" method="post" name="login"> 
            <h3 class="login-title">LOGIN</h3>
                <!-- Your login form fields go here -->

                <input type="text" id="username" placeholder="ID NO./USERNAME" autocomplete="off" required>
                <br><br>
                <input type="password" id="password" placeholder="PASSWORD" required>
                <br><br>
                <input type="submit" value="Login" name="submit" class="login-button"/><br><br>
                <p class="link"><a href="0-registration.php">New Registration</a></p>
            </form>
        </div>
    </div>
<?php
    }
?>
</body>
</html>