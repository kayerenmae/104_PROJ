<?php
require_once "db.php";
include("auth_session.php");
if(isset($_POST['save']))
{    

     $booktitle = $_POST['booktitle'];
     $callnumber = $_POST['callnumber'];
     $author = $_POST['author'];
     $published = $_POST['published'];
     $lccn= $_POST['lccn'];
     $isbn= $_POST['isbn'];
     $subject= $_POST['subject'];
     $status= $_POST['status'];
     $location= $_POST['location'];
     $sql = "INSERT INTO library_db (booktitle,callnumber,author,published,lccn,isbn,subject,status,location)
     VALUES ('$booktitle','$callnumber','$author','$published','$lccn','$isbn','$subject','$status','$location')";
     if (mysqli_query($conn, $sql)) {
        header("location: 3-database.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <?php include "head.php"; ?>
</head>
<body>
<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header mt-2" >
                    <a href="3-database.php" class="btn btn-info float-right mt-2">Back</a>
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Book Title</label>
                            <input type="text" name="booktitle" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Call number</label>
                            <input type="text" name="callnumber" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Published/Created</label>
                            <input type="text" name="published" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>LCCN</label>
                            <input type="text" name="lccn" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>ISBN</label>
                            <input type="text" name="isbn" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="" maxlength="12" required="">
                        </div>


                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="3-database.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>
        <?php include "js.php"; ?>
</body>
</html>