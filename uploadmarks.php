<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Managament System</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/colors.css">
    <link type="text/css" rel="stylesheet" href="style.css">

</head>


<body>
    <?php include("topnav.php");
    include("connection.php");
    include("validate.php");?>
    <?php
    if(isset($_GET['submit']))
    {
    $sem=$_GET['sem'];
    $_SESSION['sem']=$sem;
    $subid=$_GET['subid'];
    $_SESSION['sub']=$subid;
    $ia=$_GET['ia'];
    $_SESSION['ia']=$ia;
    }
    ?>
    <div class="row">

      <div class="col col-md-2">
        <a href="teacherlogin.php" style="  color: #fff;
          font-weight: 600;
          text-decoration: none;">Home</a>
<form>
<?php
$sem=$_SESSION['sem'];
$result=mysqli_query($con,"select * from Student where sem='$sem'");
if($result)
{
  ?>
  <select name= "usn" class="seusn">
  <?php
while($row=mysqli_fetch_array($result))
{
  $re=$row[0];
  ?>
  <option value="<?php echo $re?>">
  <?php
  echo "$row[0]</br>";
}
}
 ?>
</option>
</select>
<br/>
<input type="submit" value="Get" class='btnSubmit' name='get' />
</form>
<br/>
<form  onsubmit="return validate()" method="post" class="questionnumber">
  1a. <input type="number" value="0" name='1a' id="1a"  style="width: 4em;"/>
  1b. <input type="number" value="0" name='1b' id="1b" style="width: 4em;"/>
  1c. <input type="number" value="0" name='1c' id="1c" style="width: 4em;"/>
  2a. <input type="number" value="0" name='2a' id="2a" style="width: 4em;"/>
  2a. <input type="number" value="0" name='2b' id='2b'  style="width: 4em;"/>
  2c. <input type="number" value="0" name='2c' id='2c' style="width: 4em;"/>
  3a. <input type="number" value="0" name='3a' id='3a'  style="width: 4em;"/>
  3b. <input type="number" value="0" name='3b' id='3b' style="width: 4em;"/>
  3c. <input type="number" value="0" name='3c'  id='3c' style="width: 4em;"/>
  4a. <input type="number" value="0" name='4a' id='4a' style="width: 4em;"/>
  4b. <input type="number" value="0" name='4b' id='4b' style="width: 4em;"/>
  4c. <input type="number" value="0" name='4c' id='4c' style="width: 4em;"/>
<input type="submit" value="Calculate" name="marks" class='btnSubmit'/>
</form>
      </div>
      <div class="col col-md-5">

                      <?php
                      $subid=$_SESSION['sub'];
                        $arr=[];
                        $i=0;
  $state_query = "select * from images where type='SOL' and subid='$subid'";
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
} ?>
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
<?php
}
else {
  echo "No record found";
}?>
  </div>

      <div class="col col-md-5">

        <?php
        if(isset($_GET['get']))
        {
          //echo "hello";
          $arr=[];
          $i=0;
          $ia=$_SESSION['ia'];
          $su=$_SESSION['sub'];
          $usn=$_GET['usn'];

          $_SESSION['usn']=$usn;
            $result=mysqli_query($con,"select * from studnt_ans where usn='$usn' and ia='$ia' and subjectcode='$su'");
          if(mysqli_num_rows($result)>0)
          {
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" ride="false">
  <div class="carousel-inner">
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">
<?php
            while($row=mysqli_fetch_array($result))
        {
      $arr[$i]=$row[4];
    }?>
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
  ?>
</div>
<a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>

</div>
</div>


  <?php
  }
  else {
    echo "No record found";
  }
}
   ?>
      </div>

    <?php
if(isset($_POST['marks']))
{
  $ia=$_SESSION['ia'];

  $usn=$_SESSION['usn'];
  $first=$_POST['1a']+$_POST['1b']+$_POST['1c'];
  $second=$_POST['2a']+$_POST['2b']+$_POST['2c'];
  if($first>$second)
  {
    $total=$first;
  }
  else {
    $total=$second;
    }
    $third=$_POST['3a']+$_POST['3b']+$_POST['3c'];
    $forth=$_POST['4a']+$_POST['4b']+$_POST['4c'];
    if ($third>$forth) {
      $total+=$third;
    }
    else {
      $total+=$forth;
    }

   $result=mysqli_query($con,"update $ia set 17mca41='$total' where usn='$usn' ");
if($result)
{
  echo "Data added Sucessfully";
}
}
     ?>


          <script src="js/jquery-3.3.1.min.js" ></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="index.js"></script>
</body>
</html>
