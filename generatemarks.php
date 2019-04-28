<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Marks</title>
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
    <form method="post" >

      <select class="custom-select" name="sem">
        <option selected value="0">Select Sem</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
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
      <input type="submit" value="Generate" name="submit" class="btnSubmit"/>
    </form>
  </div>
<?php
if(isset($_POST['submit']))
{
  ?>
  <table class="table table-striped tablecl">
  <thead>
    <tr>
      <th>
      USN
    </th>
    <th>
    Name
  </th>
  <th>
  Generated Final  Marks
  </th>
</tr>
</thead>
  <?php
  $s=$_POST['sem'];
$result=mysqli_query($con,"select * from student where sem='$s'");
while($row=mysqli_fetch_array($result))
{
  $usn=$row[0];
  $sub=$_POST['subid'];
$q="UPDATE FA set $sub = case when $sub < 1 then  (
    SELECT AVG( $sub)/2 as Average FROM ( SELECT * FROM ( SELECT $sub,USN FROM `ia1`
                                             UNION ALL SELECT $sub,USN FROM `ia2`
     UNION all SELECt $sub,USN from `ia3` )I WHERE USN ='$usn'
ORDER BY $sub desc LIMIT 2 OFFSET 0 )D group by $sub,usn
)
else $sub end
    where USN='$usn'";
    $check=mysqli_query($con,$q);
  $set=mysqli_query($con,"select $sub from fa where usn='$usn'");
$row2=mysqli_fetch_array($set);
  echo "<tr>
    <td> $row[0]</td>
    <td>$row[1]</td>
    <td>$row2[0]</td>
</tr>";
}

}
 ?>

</table>
    <script src="js/jquery-3.3.1.min.js" ></script>

           <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
    </body>
    </html>
