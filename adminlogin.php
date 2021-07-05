
<?php
   session_start();
   $connection=mysqli_connect('localhost','root','','rms');

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $email = mysqli_real_escape_string($connection,$_POST['email']);
      $password = mysqli_real_escape_string($connection,$_POST['password']);

      $query = "SELECT name, email FROM admin WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($connection,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $email and $password, table row must be 1 row

      if($count == 1)
      {
        $_SESSION['name'] = $row["name"];
        $_SESSION['email']=$row["email"];
        $remember=$_POST['remember'];
        if(isset($_POST['remember']))
        {
          setcookie('email', $email, time()+60*60*30);
        }
         header('location: admin_homepage.php');
      }
      else {
         echo"Your Login Name or Password is invalid";
      }
   }
?>

<html>
    <head>
        <title>Admin Log In</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="jquery-3.5.1.slim.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="logo.png" height="75" class="d-inline-block" alt="Business"> <b><font color="red"> EWU RESULT MANAGEMENT SYSTEM </font> </b>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto">

               <li class="nav-item active">
                 <a class="nav-link" href="index.php"> Home
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

       <style>
  form { 
        border: 6px solid #f1f1f1; 
    } 
    button:hover { 
        opacity: 0.7; 
    } 
</style>
 <section>
      <div class="container">
        <div class="row">
           <div class="col-md-4 offset-md-4">
            <h3 class="text-center"></h3>
             <form class="form-group" action="" method="POST">
               <div class="container">
            <div>
                <center><h2><b>Admin Login</b></h2><hr/></center>

                                <label>Email:
                                <input type="text" name="email" class="form-control" placeholder="Enter email">
                                </label><br>
                                <label>Password:
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                </label><br>
                              
                        
                              <input type="checkbox" name="remember" id="remember"/> <label for="remember-me">Remember me</label>
                            
                            <br>
                      
                           <input type="submit" name="submit" value="Sign In" class="btn btn-primary">
                    </form>

                </div>
              </div>
            </div>
            <br><br><br>


</body>
</html>

