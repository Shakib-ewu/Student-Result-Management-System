<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Result Show</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/custom.css">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <script src="jquery-3.5.1.slim.min.js"></script>
   <script src="popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 </head>
<body style="margin-bottom: 100px;">
  <nav class="navbar navbar-expand-lg navbar-light">
     <div class="container">
       <a class="navbar-brand" href="index.php">
         <img src="logo.png" height="75" class="d-inline-block" alt="ewu"><b><font color="red"> EWU RESULT MANAGEMENT SYSTEM</font></b>
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">

              <a class="nav-link" href="homepage.php"> Home
                <span class="sr-only">(current)</span>
              </a>


            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class='fas fa-user-alt'></i>
                
                    USER
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
                
                    <a class="dropdown-item" href="sign_in_student.php">Student Sign In </a>
                    <a class="dropdown-item" href="sign_in_teacher.php">Teacher Sign In</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="sign_up_student.php">Student Sign Up </a>
                    <a class="dropdown-item" href="sign_up_teacher.php">Teacher Sign Up</a>
              
                </div>
            </li>
          </ul>
        </div>
    </div>
  </nav>

  
  <br>
  <br>
 
  <b><center><h2>Semester Wise Result</h2></center></b>

<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<title>Semester Wise Result</title>
<body>
	<table class="table " border="1">
		<tr>
      <th>Semester Name</th>
      <th>Course Name</th>
      <th>Result Type</th>
      <th>Marks</th>
      <th>Percentage</th>
      </tr>
		<?php
		$sql="SELECT * from result where user_email='{$_SESSION['email']}'";
        $connection=mysqli_connect('localhost','root','','rms');
        $res = mysqli_query($connection,$sql);

       while($row=mysqli_fetch_array($res))
{   
  ?>
      
      <tr>
        <td> <?php echo "{$row['semester']}"?>
        </td><td> <?php echo "{$row['course']}"?></td>
        <td><?php echo "{$row['result_type']}"?></td>
        <td> <?php echo "{$row['marks']}"?></td>
        <td> <?php echo "{$row['percent']}"?></td>


      </tr>
      <?php 
      
   }


		?>

	</table><br>
	<button class="btn btn1" onclick="window.print()">Print this result</button>

</body>
</html>