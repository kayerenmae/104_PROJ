<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: 00-login.php");
        exit();
    }
?>