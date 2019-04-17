<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Faculty</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include("topnav.php");?>
<?php include("sidenav.php");?>
<?php include("validate.php");?>
<div class=" container addf">
<form method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
          <input class="text" type="text" name="fname" placeholder="Name" required="">
					<input class="text" type="email" name="email" placeholder="Email" required="" >
					<input class="text" type="password" name="password" placeholder="Password" required="" id="cnew">
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="" id="new">
                    <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" onchange="document.getElementById('setct').disabled = !this.checked;" >
  <label class="custom-control-label" for="customCheck1">Class Teacher?</label>
</div>
<select class="custom-select" disabled=true id="setct" name="sem">
  <option selected value="0">Select Sem</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
</select>
     <br/>
					<input type="submit" value="Add" class="btnSubmit" name="submit">
                </form>
</div>
      <script src="js/jquery-3.3.1.min.js" ></script>

       <script src="js/bootstrap.min.js"></script>
       <script src="index.js"></script>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
$id=$_POST['Username'];
$n=$_POST['fname'];
$e=$_POST['email'];
$p=$_POST['password'];
$s=$_POST['sem'];
$query="INSERT INTO `faculty` (`fid`, `fname`, `email`, `password`, `classt`) VALUES ('$id', '$n', '$e', '$p', '$s')";
if(mysqli_query($con,$query))
{
  echo "sucess";
}
else {
  echo "not sucess";
}
}
 ?>
