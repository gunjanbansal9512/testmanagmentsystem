<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include("topnav.php");
include("sidenavte.php");
?>
  <?php include("validate.php");?>
<div class="container addstd">
<form action="#" method="post">
                    <input class="text" type="text" name="name" placeholder="Name" required="">
                    <input class="text" type="text" name="usn" placeholder="USN" required="">


					<input class="text" type="email" name="email" placeholder="Email Id" required="">
                    <input class="text" type="number" name="phno" placeholder="Ph no" required=""  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "10">
					<input class="text" type="number" name="join" placeholder="Joining Year" required="">

                    <br/>
                    <input type="submit" name="submit" value="Add" class="btnSubmit">
				</form>
</div>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
    $n=$_POST['name'];
    $u=$_POST['usn'];
    $e=$_POST['email'];
    $p=$_POST['phno'];
    $j=$_POST['join'];
    $id=$_SESSION['login_user'];
$row=mysqli_query($con,"select classt from faculty where fid='$id'");
if($result=mysqli_fetch_array($row))
{
  $s=$result['classt'];
  if($s==0)
  {
?>
<div class="alert alert-info"  data-dismiss="alert" aria-label="close">
    <strong>Info!</strong> Sorry Only Class Teacher's Can Add Students.
  </div>
  <?php }

  else {

    mysqli_query($con,"INSERT INTO `student` (`usn`, `name`, `sem`, `phno`, `email`, `year`) VALUES ('$u', '$n', '$s', '$p', '$e', '$j')");
mysqli_query($con,"INSERT INTO `ia1` (`usn`, `name`) VALUES ('$u', '$n')");
mysqli_query($con,"INSERT INTO `ia2` (`usn`, `name`) VALUES ('$u', '$n')");
mysqli_query($con,"INSERT INTO `ia3` (`usn`, `name`) VALUES ('$u', '$n')");
mysqli_query($con,"INSERT INTO `fa` (`usn`, `name`) VALUES ('$u', '$n')");
  }
}

}
?>
<script src="js/jquery-3.3.1.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
