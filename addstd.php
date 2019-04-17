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
                    <input class="text" type="number" name="phno" placeholder="Ph no" required="">
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
$row=mysqli_query($con,"select classt from faculty where fid='vinita123'");
if($result=mysqli_fetch_array($row))
{
  $s=$result['classt'];
  if($s>=1)
  {
    mysqli_query($con,"INSERT INTO `student` (`usn`, `name`, `sem`, `phno`, `email`, `year`) VALUES ('$u', '$n', '$s', '$p', '$e', '$j')");
  }
  else {
    ?>
    <script>alert("You cant add student");</script>
    <?php
  }
}

}
?>
<script src="js/jquery-3.3.1.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
