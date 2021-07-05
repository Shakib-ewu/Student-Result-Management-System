<?php
session_start();
$check_auth=$_SESSION['email'];
$connection=mysqli_connect('localhost','root','','rms');
$auth_query="select * from admin where email='$check_auth'";
$check_result=mysqli_query($connection, $auth_query);
$count_auth=mysqli_num_rows($check_result);
if($count_auth==0)
{
  echo'<br>Unauthorized Access!! Permission Denied!!!! <br> <a href="sign_out.php"> Destroy Session </a>';
  exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $connection=mysqli_connect('localhost', 'root', '', 'rms');
  $stdemail=mysqli_real_escape_string($connection, $_POST['stdemail']);
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Manage Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="admin_homepage.php">
          <img src="logo.png" height="65" class="d-inline-block" alt="ewu"> <b><font color="red"> EWU RESULT MANAGEMENT SYSTEM </font> </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="admin_homepage.php">Home</a>
             </li>
             
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>
   <br><br>

   

     
    <div class="container">
    <div class="row">
    <div class="offset-md-4 col-md-4">
      <h3> <b>Student Information</b> </h3><br>

     <form class="edit" action="edit_profile_student_confirm.php" method="POST">
       <label class="form-group" for="fname">Edit Student's First Name</label><br>
       <input type="text" name="fname" placeholder="Enter Firstname" required> <br>
       <label class="form-group" for="lname">Edit Student's Last Name</label><br>
       <input type="text" name="lname" placeholder="Enter Lastname" required> <br>
       <input type="hidden" name="oldemail" value="'.$stdemail.'">
       <label class="form-group" for="email">Edit Student's Email</label><br>
       <input type="text" name="email" placeholder="Enter Email" required> <br>
       <label class="form-group" for="contact">Enter new Contact Number:</label><br>
       <input type="text" name="contact" placeholder="Enter New Contact" required><br>
       <label class="form-group" for="email">Edit Date of Birth:</label><br>
       <input type="date" name="dob" placeholder="Enter Date of Birth"><br>
       <input type="submit" class="btn btn-success" value="Confirm Edit" required>
     </form>
   </div>
   </div>
   </div>
   <script>
   $(document).ready(function(){
     $('.edit').on('submit', function(){
       if(confirm("Are You sure?"))
       {
         return true;
       }
       else
       {
         return false;
       }

     });
   });

   </script>

   <br><br><br>
 </body>
 </html>
