<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="icon" type="image" href="favicon.ico">
    <title>Database</title>
</head>
<body>
    <div class="sidebar close">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <img src="dwcl_logo.png" alt="dwcl logo" class="mb-4">
            <a href="2-dashboard.html">Dashboard</a>
            <a href="https://github.com/">Cloud Storage</a>
            <a href="4-userprofile.html">User Profile</a>
            <a href="00-login.html">Logout</a>
        </div>
    </div>
    <span style="color: #0074d9; font-size:30px;cursor:pointer" onclick="openNav()">&#9776; DWC Library</span>


  <script>
    function openNav() { s
      document.getElementById("mySidenav").style.width = "250px";
    }
 
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    function myFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
    </script>


<div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left mt-4">Database</h2>
                        <a href="create.php" class="btn btn-success float-right">Add New Data</a>
                    </div>
                   <?php 
                    include_once 'db.php';
                    $result = mysqli_query($conn,"SELECT * FROM library_db");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped mt-4'>
                      
                      <tr>
                        <td>Book Title</td>
                        <td>Call number</td>
                        <td>Author</td>
                        <td>Published/Created</td>
                        <td>LCCN</td>
                        <td>ISBN</td>
                        <td>Subject</td>
                        <td>Status</td>
                        <td>Location</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["Book Title"]; ?></td>
                        <td><?php echo $row["Call number"]; ?></td>
                        <td><?php echo $row["Author"]; ?></td>
                        <td><?php echo $row["Published/Created"]; ?></td>
                        <td><?php echo $row["LCCN"]; ?></td>
                        <td><?php echo $row["ISBN"]; ?></td>
                        <td><?php echo $row["Subject"]; ?></td>
                        <td><?php echo $row["Status"]; ?></td>
                        <td><?php echo $row["Location"]; ?></td>
                        <td><a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" title='Update Record'>Update</a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" title='Delete Record'>Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>
<?php include 'js.php';?>  
</body>
</html>
