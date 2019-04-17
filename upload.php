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
    <?php include("topnav.php");?>
     <?php include("sidenav.php");?>
     <?php include("validate.php");?>
      <div class="container uploadpic">
     
      <form method="post"  enctype="multipart/form-data">
      <label for="ia">Select Exam</label>
     <select name="marks" id="ia">
     <option value="IA1">IA1</option>
     <option value="IA2">IA2</option>
     <option value="IA3">IA3</option>
     </select>
      <input type="text" placeholder="Subject code" name="code" required/>
     <span class="images">Question Paper</span> <input type="file" placeholder="Question Paper" name="qp[]"  value="qp" multiple="multiple" required/>
    <span class="images">Solutions   </span>   <input type="file" placeholder="Solutions" name="sol[]" multiple="multiple" required/>
     
      <input type="submit" name="upload" value="Upload"/> 
     
      </form>
      
      </div>
          <script src="js/jquery-3.3.1.min.js" ></script>
       
        <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
include("connection.php");
if($con)
{
if(isset($_POST['upload']))
{
$sub=$_POST['code'];
$folder='questionpaper/';
    $filename=$_FILES['qp']['name'];
    $tmpname=$_FILES['qp']['tmp_name'];
    $filetype=$_FILES['qp']['type'];
    for($i=0;$i<count($tmpname);$i++)
    {
    $name=addslashes($filename[$i]);
    $tmp=addslashes(file_get_contents($tmpname[$i]));
    $folder=$folder.$filename[$i];
    move_uploaded_file($tmpname[$i],$folder);
    if(mysqli_query($con,"INSERT INTO `images`( `subid`,`details`,`type`) VALUES ('$sub','$folder','QP')"))
    {
       
    }

    }

    $folder='solution/';
    $filename=$_FILES['sol']['name'];
    $tmpname=$_FILES['sol']['tmp_name'];
    $filetype=$_FILES['sol']['type'];
    for($i=0;$i<count($tmpname);$i++)
    {
    $name=addslashes($filename[$i]);
    $tmp=addslashes(file_get_contents($tmpname[$i]));
    $folder=$folder.$filename[$i];
    move_uploaded_file($tmpname[$i],$folder);
    if(mysqli_query($con,"INSERT INTO `images`( `subid`,`details`,`type`) VALUES ('$sub','$folder','SOl')"))
    {
       
    }

    }

}
}
else{
    echo "Not connected ";
}
?> 