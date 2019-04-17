<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/colors.css">
        <link rel="stylesheet" href="style.css">


    </head>
    <body>
    <?php include("topnavafter.php");?>

        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                <?php
                        if(isset($_GET['error']))
                        {?>

                            <script>alert('User name and Password does not match');</script>
                        <?php }
                                ?>
                    <h3>Teacher Login</h3>
                    <form  method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Id *" value="" name="fid" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="pass" value="" required/>

                        </div>
                        <div class="form-group">

                            <input type="submit" class="btnSubmit" value="Login" name="teacher" />
                        </div>

                        </form>


                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="logo.jpg" alt=""/>
                    </div>
                    <h3>HOD Login</h3>
                    <form  method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Id *" name='hid' value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name='pass' placeholder="Your Password *" value="" required/>
                        </div>
                        <?php
                        if(isset($_GET['errorh']))
                        {?>

                            <script>alert('User name and Password does not match');</script>
                        <?php }
                                ?>

                        <div class="form-group">
                   <input type="submit" class="btnSubmit" value="Login" name="hodbutton"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
          <script src="js/jquery-3.3.1.min.js" ></script>

        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php
   include("connection.php");
   session_start();
   if(isset($_POST['hodbutton'])==true)
   {
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = $_POST['hid'];
      $mypassword =$_POST['pass'];

      $sql = "SELECT hid FROM hod WHERE hid = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
     // $active = $row['name'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

        $sql = "SELECT name FROM hod WHERE hid = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
         $_SESSION['login_user'] = $row['name'] ;
    //    echo $count;
         header("location: hodlogin.php");
        // session_register("hod");
      }else {
         header("location: index.php?errorh=1");
        }
   }
}
if(isset($_POST['teacher'])==true)
   {
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['fid'];
    $mypassword =$_POST['pass'];

    $sql = "SELECT fid FROM faculty WHERE fid = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
   // $active = $row['name'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {

      $sql = "SELECT fid,fname FROM faculty WHERE fid = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
       $_SESSION['login_user'] = $row['fid'] ;
       $_SESSION['login_name']=$row['name'];
  //    echo $count;
       header("location: teacherlogin.php");
       session_register("teacher");
    }else {
      header("location: index.php?error=1");

      }
   }
}

?>
