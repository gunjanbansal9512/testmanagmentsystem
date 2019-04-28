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
     <option value="ia1">IA1</option>
     <option value="ia2">IA2</option>
     <option value="ia3">IA3</option>
     </select>
      <input type="text" placeholder="USN" name="usn" required/>
      <input type="text" placeholder="Subject code" name="code" required/>
     <span class="images">Solutions   </span>   <input type="file" placeholder="Solutions" name="sol[]" multiple="multiple" required/>

      <input type="submit" name="upload" value="Upload" class="btnSubmit"/>

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
    $ia=$_POST['marks'];
$sub=$_POST['code'];
$usn=$_POST['usn'];
    $folder='stud_solution/';
    $filename=$_FILES['sol']['name'];
    $tmpname=$_FILES['sol']['tmp_name'];
    $filetype=$_FILES['sol']['type'];
    for($i=0;$i<count($tmpname);$i++)
    {
    $name=addslashes($filename[$i]);
    $tmp=addslashes(file_get_contents($tmpname[$i]));
    $folder=$folder.$filename[$i];
    move_uploaded_file($tmpname[$i],$folder);
    if(mysqli_query($con,"INSERT INTO `studnt_ans`(`usn`,`subjectcode`,`ia`,`details`) VALUES ('$usn','$sub','$ia','$folder')"))
    {

    }
    else {
      echo "fail";
    }

    }

}
}
else{
    echo "Not connected ";
}
?>
