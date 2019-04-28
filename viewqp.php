<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Marks</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("topnav.php");
    include("sidenavte.php");
    include("validate.php");
    include("connection.php");
    ?>
    <div class="container">

<form class="subqp">
      <select class="custom-select" name='subid'>
      <?php
      $id=$_SESSION['login_user'];
      // echo "$id";
      $q="select subid,name from subject";
      $sql = "select subid,name from subject where fid='$id'";
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result))
      {
        ?>
      <option value="<?php echo $row[0];?>"> <?php echo "$row[1]"?>
      </option>
      <?php

      }
       ?>
      </select>
            <input type="submit" value="Submit" name="submit" class="btnSubmit"/>
          </form>


    <div class="row" style="margin-left:50px;">
<?php
if(isset($_GET['submit']))
{ ?>
    <div class="col col-md-10">

                    <?php
                      $arr=[];
                      $i=0;
                      $su=$_GET['subid'];

    $state_query = "select * from images where type='QP' and subid='$su'";
    $state_result = mysqli_query($con,$state_query);
    if(mysqli_num_rows($state_result)>0)
    {
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" ride="false">
    <div class="carousel-inner">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">

    <?php
    {  while($r = mysqli_fetch_array($state_result)){
    $arr[$i]=$r[2];
    $i++;
    }
    ?>
    <div class="carousel-item active">
    <img class="d-block w-100" src="<?php echo $arr[0];?>" alt="First slide" height="500" width="500">
    </div>
    <?php
    for ($i=1;$i<count($arr);$i++)
    {
    ?>
    <div class="carousel-item">
    <img class="d-block w-100" src="<?php echo $arr[$i]; ?>" alt="Second slide">
    </div>
    <?php
    }
  }?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>

    </div>
</div>
</div>
<?php
    }
else {
  echo "No Record";
} ?>
<?php } ?>
</div>
<script src="js/jquery-3.3.1.min.js" ></script>

       <script src="js/bootstrap.min.js"></script>
</body>
</html>
