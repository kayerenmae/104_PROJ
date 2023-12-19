<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image" href="favicon.ico">
    <title>Dashboard</title>

    <?php include "head.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<body>
    <div class="container">
        <div class="center-content">
            <h2>DIRECTORY</h2><br>
            <form action="3-database.html" method="post">
                <button type="submit">Database</button>&nbsp;
            <form action="https://github.com" method="post">
                    <button type="submit">Cloud Database</button>
                </form><br>
            <form action="4-userprofile.html" method="post">
                <button type="submit">User Profile</button>
                </form>
            </form>
        </div>
    </div>
</body>
</html>