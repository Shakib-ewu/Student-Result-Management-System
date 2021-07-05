
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Drop Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="homepage.php">
           <img src="logo.png" height="75" class="d-inline-block" alt="ewu"><b><font color="red"> EWU RESULT MANAGEMENT SYSTEM</font></b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="teacher_homepage.php">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>
<?php

if (isset($_POST['add_btn'])) {
	$user_email=$_POST['user_email'];
	$semester=$_POST['semester'];
	$result_type=$_POST['result_type'];
	$course=$_POST['course'];
    $percent=$_POST['percent'];
    $marks=$_POST['marks'];
     $connection=mysqli_connect('localhost','root','','rms');
     $sql="INSERT INTO result (user_email, semester, result_type,course,percent,marks)
    VALUES ('$user_email', '$semester', '$result_type','$course','$percent','$marks')";
if(mysqli_query($connection, $sql))
{
	echo "success";


}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

	<form class="center" action="result.php" method="POST">
	<label>Enter user email</label>	
    <input type="text" name="user_email" placeholder="Enter user email"><br>
    <label>Semester</label>	
    <select name="semester">
    	<option value="Summer 17">Summer 17</option>
    	<option value="Summer 18">Summer 18</option>
    	<option value="Summer 19">Summer 19</option>
    	<option value="Summer 20">Summer 20</option>
    	<option value="Fall 17">Fall 17</option>
    	<option value="Fall 18">Fall  18</option>
    	<option value="Fall 19">Fall  19</option>
    	<option value="Fall 20">Fall  20</option>
    	<option value="Spring 17">Spring 17</option>
    	<option value="Spring 18">Spring 18</option>
    	<option value="Spring 19">Spring 19</option>
    	<option value="Spring 20">Spring 20</option>

    </select><br>
    <label>Result Type</label>	
    <select name="result_type">
    	<option value="mid 1">mid 1</option>
    	<option value="mid 2">mid 2</option>
    	<option value="mid 2">Final</option>
    	<option value="mid 2">quiz 1</option>
    	<option value="mid 2">quiz 2</option>
    </select><br>
    <label>enter course name</label>	
    <input type="text" name="course" placeholder=""><br>
    <label>Enter marks</label><br>	
    <input type="number" name="marks" placeholder=""><br>
    <label>Enter Percent</label><br>	
    <input type="number" name="percent" placeholder=""><br>	
    <input type="submit" class="btn" name="add_btn" value="add result"><br>
	</form>

</body>
</html>