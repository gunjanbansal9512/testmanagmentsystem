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
     <?php include("sidenavte.php");?>
    
     <div class="container uploadmarks"/>
     <form action="" method="post">
     <label for="ia">Select Exam</label>
     <select name="marks" id="ia">
     <option value="IA1">IA1</option>
     <option value="IA2">IA2</option>
     <option value="IA3">IA3</option>
     </select>
     <input type="text" name="subject" placeholder="Subject Code" required/>
     <input type="number" name="month" placeholder="Month" min="1" max="12" required/>
     <input type="number" name="year" placeholder="Year" min="2019" max="2030" required/>
     <input type="submit" value="Edit" name="submit" class="btnSubmit"/>
     </form>
     
     </div>
     <?php
     include("connection.php");
     if(isset($_POST['submit']))
     {
         echo "<div class='container marks'>";
         $month=$_POST['month'];
         $year=$_POST['year'];
         $sc=$_POST['subject'];
         $qry="select * from ia1 where subjectcode ='$sc'";
         $data=mysqli_query($con,$qry);
         if(mysqli_num_rows($data))
         {
             echo "<table style='padding: 2px' border='1px solid black'><tr><th>USN</th><th>Name</th><th>Subject Code</th><th>Marks</th><th>Month</th><th>Year</th>";
             echo "<form action='' method='post'>";
             while($row=mysqli_fetch_array($data))
            {
               
               echo "<tr><td>".$row['usn']."</td><td>".$row['name']."</td><td>".$row['subjectcode']."</td><td>".
               "<input type='number' name='marks' value=''/>".
               "</td><td>".$month."</td><td>".$year."</td></tr>";
            
            }
             
            echo "<tr>
            <td><input type='submit' name='add' value='Add'/></td>
            <td><input type='reset' name='cancel' value='Cancel'/></td>
            </form>";
                echo"</table>";
         }
         else
         {
             echo "Error";
         }
         echo "</div>";
             }
     ?>
          <script src="js/jquery-3.3.1.min.js" ></script>
       
        <script src="js/bootstrap.min.js"></script>
</body>
</html>