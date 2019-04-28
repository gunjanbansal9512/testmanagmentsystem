<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("topnav.php");
    include("sidenavte.php");
    include("validate.php");
    ?>

    <div class="container changepass">
    <form action="" method="post">
        <h3>Change Password</h3>
        <input type="Password" placeholder="Old Password" name="old" />
        <input type="Password" placeholder="New Password" name="new" id="new"/>
        <input type="Password" placeholder="Confirm Password" name="cnew" id="cnew"/>
        <input type="submit" value="Confirm" class="btnSubmit" name="change"/>
        <input type="reset" value="Cancel" class="btnReset"/>
    </form>
</div>
<script src="js/jquery-3.3.1.min.js" ></script>

       <script src="js/bootstrap.min.js"></script>
<script src="index.js"></script>
</body>
</html>

<?php
if(isset($_POST['change']))
{
    include("connection.php");
    $q="select password from faculty where fid='$_SESSION[login_user]'";
    if($result=mysqli_query($con,$q))
    {
      $row=mysqli_fetch_array($result);
      if($row['password']==$_POST['old'])
      {
        $n=$_POST['new'];
        $i=$_SESSION['login_user'];
        mysqli_query($con,"update faculty set password='$n' where fid='$i'");
        ?>
        <div class="alert alert-info"  data-dismiss="alert" aria-label="close">
            <strong>Info!</strong> Password Sucesfully Changed...
          </div>
        <?php
      }
      else {?>
        <div class="alert alert-danger alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Danger!</strong>Username and Password Doesnot Match......
 </div>
        <?php

      }
    }
}
 ?>
