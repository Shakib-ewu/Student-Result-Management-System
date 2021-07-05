
<?php
  session_start();
  $check_auth=$_SESSION['email'];
  $connection=mysqli_connect('localhost','root','','rms');
  $auth_query="select * from users where email='$check_auth'";
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
    <title>Enrolled Courses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
  <body>
    <style media="screen">

    </style>
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
               <a class="nav-link" href="homepage.php">Home</a>
             </li>
             
             <li class="nav-item">
               <a class="nav-link" href="sign_out.php">Sign out</a>
             </li>
           </ul>
         </div>
     </div>
   </nav>

   <div class="container">
   </div>
   <br><br>
   <div class="container">
       <h1>Enrolled Courses</h1>
     <hr/>

   </div>
   <br>
   <div class="container">
       <?php
       $falsemsg="null";
       $truemsg="null";
       $connection=mysqli_connect('localhost','root','','rms');
       $email= $_SESSION['email'];

       $query="select * from courseinfo where stdemail='$email'";
       $result=mysqli_query($connection,$query);

           if($result)
              {
                if(mysqli_num_rows($result)>0)
                    {
                      echo'<div class="row">';
                      while($ans=mysqli_fetch_array($result))
                        {
                                      $cname=$ans['coursename'];
                                      echo'<div class="col-md-4"><div class="card"><div class="cardcontainer">';
                                      $query2="select teacher, teacher_email, routine, start, end from courses where coursename='$cname'";
                                      $result2=mysqli_query($connection,$query2);
                                      $ans2=mysqli_fetch_array($result2);
                                      $teacher=$ans2['teacher'];
                                      $teacher_email=$ans2['teacher_email'];
                                      $routine=$ans2['routine'];
                                      $start=$ans2['start'];
                                      $end=$ans2['end'];
                                      echo'<span><h1>'.$ans['coursename'].'</h1></span>';
                                      echo'<span>  By:</span> '.$teacher.'<br>';
                                      echo'<span>  Routine:</span> '.$routine.'<br>';
                                      echo'<span>  Start Time:</span> '.$start.'<br>';
                                      echo'<span>  End Time:</span> '.$end.'<br>';
                                      echo'<form method="POST" action="attendance.php">
                                      <input type="hidden" name="coursename" value="'.$cname.'">
                                      <input type="hidden" name="teacher" value="'.$teacher.'">
                                      <input type="hidden" name="teacher_email" value="'.$teacher_email.'">
                                      <input type="hidden" name="routine" value="'.$routine.'">
                                      <input type="hidden" name="start" value="'.$start.'">
                                      <input type="hidden" name="end" value="'.$end.'"> 
                                      <h5>(24h Format)</h5><br><br>
                                      <input type="submit" class="btn5 btn-primary btn-block" value="Enter Class">
                                      </form>';
                                      echo'</div></div><br><br></div>';

                        }
                        echo'</div>';
                    }
                }
          else
          {
               echo "Nothing to show Here <br>";
          }

                          ?>


                      </div>

   <br><br><br>
  </body>
</html>
