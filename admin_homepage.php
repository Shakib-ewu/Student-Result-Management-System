
<?php
  session_start();
  $cookie_name = 'email';
  if(isset($_COOKIE[$cookie_name]))
  {
    echo 'Account information is saved --> '.$_COOKIE[$cookie_name];
  }
  else
  {
    echo 'Account is not saved';
  }
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
?>
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
        <a class="navbar-brand" href="admin_homepage.php">
          <img src="logo.png" height="75" class="d-inline-block" alt="ewu"><b><font color="red"> EWU RESULT MANAGEMENT SYSTEM</font></b>
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
   <br><br>



       <div class="col-md-4">
         <div class="middle">
           <h3><a href="man_std.php"> Manage Students</a></h3>
         </div>
       </div><br><br><br>
   <br><br>
   <br><br>
   <br><br>


       <div class="col-md-4">
         <div class="middle">
            <h3><a href="man_courses.php"> Manage Courses</a></h3>
         </div>
       </div>
   <br><br><br>
  </body>
</html>
