<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query    = "INSERT into `users` (username, password, email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='00-login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='0-registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="container">
        <div class="center-content">
            <form class="form" action="" method="post">
                <h1 class="login-title">Registration</h1>
                <input type="text" class="login-input" name="email" placeholder="Email" autocomplete="off"  required />
                <input type="text" class="login-input" name="id_number" placeholder="ID Number" autocomplete="off" required />
                <input type="text" class="login-input" name="username" placeholder="Username" autocomplete="off" required />
                <input type="password" class="login-input" name="password" placeholder="Password" autocomplete="off" required />
                <input type="password" class="login-input" name="passwordRepeat" placeholder="Repeat Password" autocomplete="off" required />
                <input type="submit" name="submit" value="Register" class="login-button">
                <p class="link"><a href="00-login.php">Click to Login</a></p>
            </form>
        </div>
    </div>
<?php
    }
?>
</body>
</html>