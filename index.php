<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/custom.css">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <script src="jquery-3.5.1.slim.min.js"></script>
   <script src="popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   <link rel="stylesheet" type="text/css" href="css/style.css">
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

  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

 </body>
 <footer>

  <div class="container">
     <div class="middle">

      <h2>Admin Login</h2>

       <p>Click the button to sign in a admin</p>
       <button class="btn3" onclick="document.location='adminlogin.php'">Admin Login</button>

      </div>

     </div>

   </div>
 </footer>
 </html>


