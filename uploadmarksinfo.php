<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Marks</title>
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

    <div class="container marksinfo" >
    <form method="get" action="uploadmarks.php" onsubmit="return validate2()">

      <select class="custom-select" name="sem" id="sem">
        <option selected value="0">Select Sem</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <select class="custom-select" name="ia" id="ia">
        <option selected value="0">IA</option>
        <option value="ia1">1</option>
        <option value="ia2">2</option>
        <option value="ia3">3</option>
        </select>
<select class="custom-select" name='subid' id="sub">
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
  </div>

    <script src="js/jquery-3.3.1.min.js" ></script>

           <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    </body>
    </html>
