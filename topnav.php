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

<nav class="navbar navbar-light bg-black">
        <h2 class="navbar-text" style="color:black  ;margin: 0 auto; text-align: center;">
         Test Managment System
        </h2>
       <?php session_start();
       echo "<p> $_SESSION[login_name]</p>";
        ?>
      </nav>
      <script src="js/jquery-3.3.1.min.js" ></script>

       <script src="js/bootstrap.min.js"></script>
</body>
</html>
